<?php

namespace PicoFeed;

use DateTime;
use DateTimeZone;
use DOMXPath;
use SimpleXMLElement;
use PicoFeed\Config;
use PicoFeed\Encoding;
use PicoFeed\Filter;
use PicoFeed\Grabber;
use PicoFeed\Logging;
use PicoFeed\XmlParser;

/**
 * Base parser class
 *
 * @author  Frederic Guillot
 * @package parser
 */
abstract class Parser
{
    /**
     * Config object
     *
     * @access private
     * @var \PicoFeed\Config
     */
    private $config = null;

    /**
     * Hash algorithm used to generate item id, any value supported by PHP, see hash_algos()
     *
     * @access private
     * @var string
     */
    private $hash_algo = 'crc32b'; // crc32b seems to be faster and shorter than other hash algorithms

    /**
     * Timezone used to parse feed dates
     *
     * @access private
     * @var string
     */
    private $timezone = 'UTC';

    /**
     * Feed content (XML data)
     *
     * @access protected
     * @var string
     */
    protected $content = '';

    /**
     * XML namespaces
     *
     * @access protected
     * @var array
     */
    protected $namespaces = array();

    /**
     * Enable the content grabber
     *
     * @access private
     * @var bool
     */
    public $enable_grabber = false;

    /**
     * Ignore those urls for the content scraper
     *
     * @access private
     * @var array
     */
    private $grabber_ignore_urls = array();

    /**
     * Constructor
     *
     * @access public
     * @param  string  $content        Feed content
     * @param  string  $http_encoding  HTTP encoding (headers)
     */
    public function __construct($content, $http_encoding = '')
    {
        $xml_encoding = XmlParser::getEncodingFromXmlTag($content);

        // Strip XML tag to avoid multiple encoding/decoding in the next XML processing
        $this->content = Filter::stripXmlTag($content);

        // Encode everything in UTF-8
        Logging::setMessage(get_called_class().': HTTP Encoding "'.$http_encoding.'" ; XML Encoding "'.$xml_encoding.'"');
        $this->content = Encoding::convert($this->content, $xml_encoding ?: $http_encoding);

        // Workarounds
        $this->content = $this->normalizeData($this->content);
    }

    /**
     * Parse the document
     *
     * @access public
     * @return mixed   \PicoFeed\Feed instance or false
     */
    public function execute()
    {
        Logging::setMessage(get_called_class().': begin parsing');

        $xml = XmlParser::getSimpleXml($this->content);

        if ($xml === false) {
            Logging::setMessage(get_called_class().': XML parsing error');
            Logging::setMessage(XmlParser::getErrors());
            return false;
        }

        $this->namespaces = $xml->getNamespaces(true);

        $feed = new Feed;
        $this->findFeedUrl($xml, $feed);
        $this->findFeedTitle($xml, $feed);
        $this->findFeedLanguage($xml, $feed);
        $this->findFeedId($xml, $feed);
        $this->findFeedDate($xml, $feed);

        foreach ($this->getItemsTree($xml) as $entry) {

            $item = new Item;
            $this->findItemAuthor($xml, $entry, $item);
            $this->findItemUrl($entry, $item);
            $this->findItemTitle($entry, $item);
            $this->findItemId($entry, $item, $feed);
            $this->findItemDate($entry, $item);
            $this->findItemContent($entry, $item);
            $this->findItemEnclosure($entry, $item, $feed);
            $this->findItemLanguage($entry, $item, $feed);
            $feed->items[] = $item;
        }

        Logging::setMessage(get_called_class().PHP_EOL.$feed);

        return $feed;
    }

    /**
     * Filter HTML for entry content
     *
     * @access public
     * @param  string  $item_content  Item content
     * @param  string  $item_url      Item URL
     * @return string                 Filtered content
     */
    public function filterHtml($item_content, $item_url)
    {
        $content = '';

        // Setup the content scraper
        if ($this->enable_grabber && ! in_array($item_url, $this->grabber_ignore_urls)) {

            $grabber = new Grabber($item_url);
            $grabber->setConfig($this->config);
            $grabber->download();

            if ($grabber->parse()) {
                $item_content = $grabber->getContent();
            }
        }

        // Content filtering
        if ($item_content) {

            if ($this->config !== null) {

                $callback = $this->config->getContentFilteringCallback();

                if (is_callable($callback)) {
                    $content = $callback($item_content, $item_url);
                }
            }

            if (! $content) {
                $filter = new Filter($item_content, $item_url);
                $filter->setConfig($this->config);
                $content = $filter->execute();
            }
        }

        return $content;
    }

    /**
     * Dirty quickfixes before XML parsing
     *
     * @access public
     * @param  string  $data Raw data
     * @return string        Normalized data
     */
    public function normalizeData($data)
    {
        $invalid_chars = array(
            "\x10",
            "\xc3\x20",
            "&#x1F;",
        );

        foreach ($invalid_chars as $needle) {
            $data = str_replace($needle, '', $data);
        }

        $data = $this->replaceEntityAttribute($data);
        return $data;
    }

    /**
     * Replace & by &amp; for each href attribute (Fix broken feeds)
     *
     * @access public
     * @param  string  $content Raw data
     * @return string           Normalized data
     */
    public function replaceEntityAttribute($content)
    {
        $content = preg_replace_callback('/href="[^"]+"/', function(array $matches) {
            return htmlspecialchars($matches[0], ENT_NOQUOTES, 'UTF-8', false);
        }, $content);

        return $content;
    }

    /**
     * Trim whitespace from the begining, the end and inside a string and don't break utf-8 string
     *
     * @access public
     * @param  string  $value  Raw data
     * @return string          Normalized data
     */
    public function stripWhiteSpace($value)
    {
        $value = str_replace("\r", "", $value);
        $value = str_replace("\t", "", $value);
        $value = str_replace("\n", "", $value);
        return trim($value);
    }

    /**
     * Generate a unique id for an entry (hash all arguments)
     *
     * @access public
     * @param  string  $args  Pieces of data to hash
     * @return string         Id
     */
    public function generateId()
    {
        return hash($this->hash_algo, implode(func_get_args()));
    }

    /**
     * Try to parse all date format for broken feeds
     *
     * @access public
     * @param  string  $value  Original date format
     * @return integer         Timestamp
     */
    public function parseDate($value)
    {
        // Format => truncate to this length if not null
        $formats = array(
            DATE_ATOM => null,
            DATE_RSS => null,
            DATE_COOKIE => null,
            DATE_ISO8601 => null,
            DATE_RFC822 => null,
            DATE_RFC850 => null,
            DATE_RFC1036 => null,
            DATE_RFC1123 => null,
            DATE_RFC2822 => null,
            DATE_RFC3339 => null,
            'D, d M Y H:i:s' => 25,
            'D, d M Y h:i:s' => 25,
            'D M d Y H:i:s' => 24,
            'Y-m-d H:i:s' => 19,
            'Y-m-d\TH:i:s' => 19,
            'd/m/Y H:i:s' => 19,
            'D, d M Y' => 16,
            'Y-m-d' => 10,
            'd-m-Y' => 10,
            'm-d-Y' => 10,
            'd.m.Y' => 10,
            'm.d.Y' => 10,
            'd/m/Y' => 10,
            'm/d/Y' => 10,
        );

        $value = trim($value);

        foreach ($formats as $format => $length) {

            $truncated_value = $value;
            if ($length !== null) {
                $truncated_value = substr($truncated_value, 0, $length);
            }

            $timestamp = $this->getValidDate($format, $truncated_value);
            if ($timestamp > 0) {
                return $timestamp;
            }
        }

        $date = new DateTime('now', new DateTimeZone($this->timezone));
        return $date->getTimestamp();
    }

    /**
     * Get a valid date from a given format
     *
     * @access public
     * @param  string  $format   Date format
     * @param  string  $value    Original date value
     * @return integer           Timestamp
     */
    public function getValidDate($format, $value)
    {
        $date = DateTime::createFromFormat($format, $value, new DateTimeZone($this->timezone));

        if ($date !== false) {

            $errors = DateTime::getLastErrors();

            if ($errors['error_count'] === 0 && $errors['warning_count'] === 0) {
                return $date->getTimestamp();
            }
        }

        return 0;
    }

    /**
     * Hardcoded list of hostname/token to exclude from id generation
     *
     * @access public
     * @param  string  $url  URL
     * @return boolean
     */
    public function isExcludedFromId($url)
    {
        $exclude_list = array('ap.org', 'jacksonville.com');

        foreach ($exclude_list as $token) {
            if (strpos($url, $token) !== false) return true;
        }

        return false;
    }

    /**
     * Get xml:lang value
     *
     * @access public
     * @param  string  $xml  XML string
     * @return string        Language
     */
    public function getXmlLang($xml)
    {
        $dom = XmlParser::getDomDocument($this->content);

        if ($dom === false) {
            return '';
        }

        $xpath = new DOMXPath($dom);
        return $xpath->evaluate('string(//@xml:lang[1])') ?: '';
    }

    /**
     * Return true if the given language is "Right to Left"
     *
     * @static
     * @access public
     * @param  string  $language  Language: fr-FR, en-US
     * @return bool
     */
    public static function isLanguageRTL($language)
    {
        $language = strtolower($language);

        $rtl_languages = array(
            'ar', // Arabic (ar-**)
            'fa', // Farsi (fa-**)
            'ur', // Urdu (ur-**)
            'ps', // Pashtu (ps-**)
            'syr', // Syriac (syr-**)
            'dv', // Divehi (dv-**)
            'he', // Hebrew (he-**)
            'yi', // Yiddish (yi-**)
        );

        foreach ($rtl_languages as $prefix) {
            if (strpos($language, $prefix) === 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * Set Hash algorithm used for id generation
     *
     * @access public
     * @param  string   $algo   Algorithm name
     * @return \PicoFeed\Parser
     */
    public function setHashAlgo($algo)
    {
        $this->hash_algo = $algo ?: $this->hash_algo;
        return $this;
    }

    /**
     * Set a different timezone
     *
     * @see    http://php.net/manual/en/timezones.php
     * @access public
     * @param  string   $timezone   Timezone
     * @return \PicoFeed\Parser
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone ?: $this->timezone;
        return $this;
    }

    /**
     * Set config object
     *
     * @access public
     * @param  \PicoFeed\Config  $config   Config instance
     * @return \PicoFeed\Parser
     */
    public function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * Enable the content grabber
     *
     * @access public
     * @return \PicoFeed\Parser
     */
    public function enableContentGrabber()
    {
        $this->enable_grabber = true;
    }

    /**
     * Set ignored URLs for the content grabber
     *
     * @access public
     * @param  array   $urls   URLs
     * @return \PicoFeed\Parser
     */
    public function setGrabberIgnoreUrls(array $urls)
    {
        $this->grabber_ignore_urls = $urls;
    }

    /**
     * Get a value from a XML namespace
     *
     * @access public
     * @param  SimpleXMLElement     $xml    XML element
     * @param  array                $namespaces    XML namespaces
     * @param  string               $property      XML tag name
     * @param  string               $attribute     XML attribute name
     * @return string
     */
    public function getNamespaceValue(SimpleXMLElement $xml, array $namespaces, $property, $attribute = '')
    {
        foreach ($namespaces as $name => $url) {
            $namespace = $xml->children($namespaces[$name]);

            if ($namespace->$property->count() > 0) {

                if ($attribute) {

                    foreach ($namespace->$property->attributes() as $xml_attribute => $xml_value) {
                        if ($xml_attribute === $attribute && $xml_value) {
                            return (string) $xml_value;
                        }
                    }
                }

                return (string) $namespace->$property;
            }
        }

        return '';
    }
}
