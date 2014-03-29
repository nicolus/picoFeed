<?php

namespace PicoFeed;

require_once __DIR__.'/Logging.php';
require_once __DIR__.'/Parser.php';
require_once __DIR__.'/Client.php';
require_once __DIR__.'/Filter.php';

/**
 * Reader class
 *
 * @author  Frederic Guillot
 * @package parser
 */
class Reader
{
    /**
     * Feed or site URL
     *
     * @access private
     * @var string
     */
    private $url = '';

    /**
     * Feed content
     *
     * @access private
     * @var string
     */
    private $content = '';

    /**
     * HTTP encoding
     *
     * @access private
     * @var string
     */
    private $encoding = '';

    /**
     * Constructor
     *
     * @access public
     * @param  string  $content        Feed content
     * @param  string  $encoding       Feed encoding
     * @return Reader
     */
    public function __construct($content = '', $encoding = '')
    {
        $this->content = $content;
        $this->encoding = '';
        return $this;
    }

    /**
     * Download a feed
     *
     * @access public
     * @param  string  $url            Feed content
     * @param  string  $last_modified  Last modified HTTP header
     * @param  string  $etag           Etag HTTP header
     * @param  string  $timeout        Client connection timeout
     * @param  string  $user_agent     HTTP user-agent
     * @return Client
     */
    public function download($url, $last_modified = '', $etag = '', $timeout = 5, $user_agent = 'PicoFeed (https://github.com/fguillot/picoFeed)')
    {
        if (strpos($url, 'http') !== 0) {

            $url = 'http://'.$url;
        }

        $client = Client::create();
        $client->url = $url;
        $client->timeout = $timeout;
        $client->user_agent = $user_agent;
        $client->last_modified = $last_modified;
        $client->etag = $etag;
        $client->execute();

        $this->content = $client->getContent();
        $this->url = $client->getUrl();
        $this->encoding = $client->getEncoding();

        return $client;
    }

    /**
     * Get the download content
     *
     * @access public
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Get finale URL
     *
     * @access public
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Get the first XML tag
     *
     * @access public
     * @param  string  $data        Feed content
     * @return string
     */
    public function getFirstTag($data)
    {
        // Strip HTML comments (max of 5,000 characters long to prevent crashing)
        $data = preg_replace('/<!--(.{0,5000}?)-->/Uis', '', $data);

        /* Strip Doctype:
         * Doctype needs to be within the first 100 characters. (Ideally the first!)
         * If it's not found by then, we need to stop looking to prevent PREG
         * from reaching max backtrack depth and crashing.
         */
        $data = preg_replace('/^.{0,100}<!DOCTYPE([^>]*)>/Uis', '', $data);

        // Strip <?xml version....
        $data = Filter::stripXmlTag($data);

        // Find the first tag
        $open_tag = strpos($data, '<');
        $close_tag = strpos($data, '>');

        return substr($data, $open_tag, $close_tag);
    }

    /**
     * Discover feed format and return a parser instance
     *
     * @access public
     * @param  boolean  $discover      Enable feed autodiscovery in HTML document
     * @return mixed                   False on failure or Parser instance
     */
    public function getParser($discover = false)
    {
        $first_tag = $this->getFirstTag($this->content);

        if (strpos($first_tag, '<feed') !== false) {

            Logging::log(\get_called_class().': discover Atom feed');

            require_once __DIR__.'/Parsers/Atom.php';
            return new Parsers\Atom($this->content, $this->encoding);
        }
        else if (strpos($first_tag, '<rss') !== false &&
                (strpos($first_tag, 'version="2.0"') !== false || strpos($first_tag, 'version=\'2.0\'') !== false)) {

            Logging::log(\get_called_class().': discover RSS 2.0 feed');

            require_once __DIR__.'/Parsers/Rss20.php';
            return new Parsers\Rss20($this->content, $this->encoding);
        }
        else if (strpos($first_tag, '<rss') !== false &&
                (strpos($first_tag, 'version="0.92"') !== false || strpos($first_tag, 'version=\'0.92\'') !== false)) {

            Logging::log(\get_called_class().': discover RSS 0.92 feed');

            require_once __DIR__.'/Parsers/Rss92.php';
            return new Parsers\Rss92($this->content, $this->encoding);
        }
        else if (strpos($first_tag, '<rss') !== false &&
                (strpos($first_tag, 'version="0.91"') !== false || strpos($first_tag, 'version=\'0.91\'') !== false)) {

            Logging::log(\get_called_class().': discover RSS 0.91 feed');

            require_once __DIR__.'/Parsers/Rss91.php';
            return new Parsers\Rss91($this->content, $this->encoding);
        }
        else if (strpos($first_tag, '<rdf:') !== false && strpos($first_tag, 'xmlns="http://purl.org/rss/1.0/"') !== false) {

            Logging::log(\get_called_class().': discover RSS 1.0 feed');

            require_once __DIR__.'/Parsers/Rss10.php';
            return new Parsers\Rss10($this->content, $this->encoding);
        }
        else if ($discover === true) {

            Logging::log(\get_called_class().': Format not supported or malformed');
            Logging::log(\get_called_class().':'.PHP_EOL.$this->content);

            return false;
        }
        else if ($this->discover()) {

            return $this->getParser(true);
        }

        Logging::log(\get_called_class().': Subscription not found');
        Logging::log(\get_called_class().': Content => '.PHP_EOL.$this->content);

        return false;
    }

    /**
     * Discover feed url inside a HTML document and download the feed
     *
     * @access public
     * @return boolean
     */
    public function discover()
    {
        if (! $this->content) {

            return false;
        }

        Logging::log(\get_called_class().': Try to discover a subscription');

        \libxml_use_internal_errors(true);

        $dom = new \DOMDocument;
        $dom->loadHTML($this->content);

        $xpath = new \DOMXPath($dom);

        $queries = array(
            "//link[@type='application/atom+xml']",
            "//link[@type='application/rss+xml']"
        );

        foreach ($queries as $query) {

            $nodes = $xpath->query($query);

            if ($nodes->length !== 0) {

                $link = $nodes->item(0)->getAttribute('href');

                if (! empty($link)) {

                    // Relative links
                    if (strpos($link, 'http') !== 0) {

                        if ($link{0} === '/') $link = substr($link, 1);
                        if ($this->url{strlen($this->url) - 1} !== '/') $this->url .= '/';

                        $link = $this->url.$link;
                    }

                    Logging::log(\get_called_class().': Find subscription link: '.$link);
                    $this->download($link);

                    return true;
                }
            }
        }

        return false;
    }
}
