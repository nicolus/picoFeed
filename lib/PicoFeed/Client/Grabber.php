<?php

namespace PicoFeed\Client;

use DOMXPath;
use PicoFeed\Config\Config;
use PicoFeed\Encoding\Encoding;
use PicoFeed\Logging\Logger;
use PicoFeed\Filter\Filter;
use PicoFeed\Parser\XmlParser;

/**
 * Grabber class
 *
 * @author  Frederic Guillot
 * @package Client
 */
class Grabber
{
    /**
     * URL
     *
     * @access private
     * @var string
     */
    private $url = '';

    /**
     * Relevant content
     *
     * @access private
     * @var string
     */
    private $content = '';

    /**
     * HTML content
     *
     * @access private
     * @var string
     */
    private $html = '';

    /**
     * HTML content encoding
     *
     * @access private
     * @var string
     */
    private $encoding = '';

    /**
     * Flag to enable candidates parsing
     *
     * @access private
     * @var boolean
     */
    private $enableCandidateParser = true;

    /**
     * List of attributes to try to get the content, order is important, generic terms at the end
     *
     * @access private
     * @var array
     */
    private $candidatesAttributes = array(
        'articleBody',
        'articlebody',
        'article-body',
        'articleContent',
        'articlecontent',
        'article-content',
        'articlePage',
        'post-content',
        'post_content',
        'entry-content',
        'entry-body',
        'main-content',
        'story_content',
        'storycontent',
        'entryBox',
        'entrytext',
        'comic',
        'post',
        'article',
        'content',
        'main',
    );

    /**
     * List of attributes to strip
     *
     * @access private
     * @var array
     */
    private $stripAttributes = array(
        'comment',
        'share',
        'links',
        'toolbar',
        'fb',
        'footer',
        'credit',
        'bottom',
        'nav',
        'header',
        'social',
        'tag',
        'metadata',
        'entry-utility',
        'related-posts',
        'tweet',
        'categories',
        'post_title',
        'by_line',
        'byline',
        'sponsors',
    );

    /**
     * Tags to remove
     *
     * @access private
     * @var array
     */
    private $stripTags = array(
        'nav',
        'header',
        'footer',
        'aside',
        'form',
    );

    /**
     * Config object
     *
     * @access private
     * @var \PicoFeed\Config\Config
     */
    private $config;

    /**
     * Constructor
     *
     * @access public
     * @param  \PicoFeed\Config\Config   $config   Config class instance
     */
    public function __construct(Config $config = null)
    {
        $this->config = $config ?: new Config;
        Logger::setTimezone($this->config->getTimezone());
    }

    /**
     * Disable candidates parsing
     *
     * @access  public
     * @return  Grabber
     */
    public function disableCandidateParser()
    {
        $this->enableCandidateParser = false;
        return $this;
    }

    /**
     * Get encoding
     *
     * @access  public
     * @return  string
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * Set encoding
     *
     * @access  public
     * @param   string   $encoding
     * @return  Grabber
     */
    public function setEncoding($encoding)
    {
        $this->encoding = $encoding;
        return $this;
    }

    /**
     * Get URL to download
     *
     * @access  public
     * @return  string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set URL to download
     *
     * @access  public
     * @param   string  $url    URL
     * @return  Grabber
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Return true if the scraper found relevant content
     *
     * @access public
     * @return boolean
     */
    public function hasRelevantContent()
    {
        return ! empty($this->content);
    }

    /**
     * Get relevant content
     *
     * @access public
     * @return string
     */
    public function getRelevantContent()
    {
        return $this->content;
    }

    /**
     * Get raw content (unfiltered)
     *
     * @access public
     * @return string
     */
    public function getRawContent()
    {
        return $this->html;
    }

    /**
     * Set raw content (unfiltered)
     *
     * @access public
     * @param  string   $html
     * @return Grabber
     */
    public function setRawContent($html)
    {
        $this->html = $html;
        return $this;
    }

    /**
     * Get filtered relevant content
     *
     * @access public
     * @return string
     */
    public function getFilteredContent()
    {
        $filter = Filter::html($this->content, $this->url);
        $filter->setConfig($this->config);
        return $filter->execute();
    }

    /**
     * Download the HTML content
     *
     * @access public
     * @return boolean
     */
    public function download()
    {
        if (! empty($this->url)) {

            // Clear everything
            $this->html = '';
            $this->content = '';
            $this->encoding = '';

            try {

                $client = Client::getInstance();
                $client->setConfig($this->config);
                $client->setTimeout($this->config->getGrabberTimeout());
                $client->setUserAgent($this->config->getGrabberUserAgent());
                $client->execute($this->url);

                $this->url = $client->getUrl();
                $this->html = $client->getContent();
                $this->encoding = $client->getEncoding();

                return true;
            }
            catch (ClientException $e) {
                Logger::setMessage(get_called_class().': '.$e->getMessage());
            }
        }

        return false;
    }

    /**
     * Execute the scraper
     *
     * @access public
     */
    public function execute()
    {
        $this->download();

        if (! $this->skipProcessing()) {
            $this->prepareHtml();
            $this->parse();
        }
    }

    /**
     * Returns true if the parsing must be skipped
     *
     * @access public
     * @return boolean
     */
    public function skipProcessing()
    {
        $handlers = array(
            'detectStreamingVideos',
            'detectPdfFiles',
        );

        foreach ($handlers as $handler) {
            if ($this->$handler()) {
                return true;
            }
        }

        if (empty($this->html)) {
            Logger::setMessage(get_called_class().': Raw HTML is empty');
            return true;
        }

        return false;
    }

    /**
     * Execute the rule or candidate parser
     *
     * @access public
     */
    public function parse()
    {
        $ruleLoader = new RuleLoader($this->config);
        $rules = $ruleLoader->getRules($this->url);

        if (! empty($rules['grabber'])) {

            Logger::setMessage(get_called_class().': Parse content with rules');

            foreach ($rules['grabber'] as $pattern => $rule) {

                $url = new Url($this->url);
                $sub_url = $url->getFullPath();

                if (preg_match($pattern, $sub_url)) {
                    Logger::setMessage(get_called_class().': Matched url '.$sub_url);
                    $this->parseContentWithRules($rule);
                    break;
                }
            }
        }
        else if ($this->enableCandidateParser) {
            Logger::setMessage(get_called_class().': Parse content with candidates');
            $this->parseContentWithCandidates();
        }

        Logger::setMessage(get_called_class().': Content length: '.strlen($this->content).' bytes');
    }

    /**
     * Normalize encoding and strip head tag
     *
     * @access public
     */
    public function prepareHtml()
    {
        $html_encoding = XmlParser::getEncodingFromMetaTag($this->html);

        $this->html = Encoding::convert($this->html, $html_encoding ?: $this->encoding);
        $this->html = Filter::stripHeadTags($this->html);

        Logger::setMessage(get_called_class().': HTTP Encoding "'.$this->encoding.'" ; HTML Encoding "'.$html_encoding.'"');
    }

    /**
     * Return the Youtube embed player and skip processing
     *
     * @access public
     * @return string
     */
    public function detectStreamingVideos()
    {
        if (preg_match("#(?<=v=|v\/|vi=|vi\/|youtu.be\/)[a-zA-Z0-9_-]{11}#", $this->url, $matches)) {
            $this->content = '<iframe width="560" height="315" src="//www.youtube.com/embed/'.$matches[0].'" frameborder="0"></iframe>';
            return true;
        }

        return false;
    }

    /**
     * Skip processing for PDF documents
     *
     * @access public
     * @return string
     */
    public function detectPdfFiles()
    {
        return substr($this->url, -3) === 'pdf';
    }

    /**
     * Get the relevant content with predefined rules
     *
     * @access public
     * @param  array   $rules   Rules
     */
    public function parseContentWithRules(array $rules)
    {
        $dom = XmlParser::getHtmlDocument('<?xml version="1.0" encoding="UTF-8">'.$this->html);
        $xpath = new DOMXPath($dom);

        if (isset($rules['strip']) && is_array($rules['strip'])) {

            foreach ($rules['strip'] as $pattern) {

                $nodes = $xpath->query($pattern);

                if ($nodes !== false && $nodes->length > 0) {
                    foreach ($nodes as $node) {
                        $node->parentNode->removeChild($node);
                    }
                }
            }
        }

        if (isset($rules['body']) && is_array($rules['body'])) {

            foreach ($rules['body'] as $pattern) {

                $nodes = $xpath->query($pattern);

                if ($nodes !== false && $nodes->length > 0) {
                    foreach ($nodes as $node) {
                        $this->content .= $dom->saveXML($node);
                    }
                }
            }
        }
    }

    /**
     * Get the relevant content with the list of potential attributes
     *
     * @access public
     */
    public function parseContentWithCandidates()
    {
        $dom = XmlParser::getHtmlDocument('<?xml version="1.0" encoding="UTF-8">'.$this->html);
        $xpath = new DOMXPath($dom);

        // Try to lookup in each tag
        foreach ($this->candidatesAttributes as $candidate) {

            Logger::setMessage(get_called_class().': Try this candidate: "'.$candidate.'"');

            $nodes = $xpath->query('//*[(contains(@class, "'.$candidate.'") or @id="'.$candidate.'") and not (contains(@class, "nav") or contains(@class, "page"))]');

            if ($nodes !== false && $nodes->length > 0) {
                $this->content = $dom->saveXML($nodes->item(0));
                Logger::setMessage(get_called_class().': Find candidate "'.$candidate.'" ('.strlen($this->content).' bytes)');
                break;
            }
        }

        // Try to fetch <article/>
        if (strlen($this->content) < 200) {

            $nodes = $xpath->query('//article');

            if ($nodes !== false && $nodes->length > 0) {
                $this->content = $dom->saveXML($nodes->item(0));
                Logger::setMessage(get_called_class().': Find <article/> tag ('.strlen($this->content).' bytes)');
            }
        }

        // Get everything
        if (strlen($this->content) < 50) {

            $nodes = $xpath->query('//body');

            if ($nodes !== false && $nodes->length > 0) {
                Logger::setMessage(get_called_class().' No enought content fetched, get //body');
                $this->content = $dom->saveXML($nodes->item(0));
            }
        }

        Logger::setMessage(get_called_class().': Strip garbage');
        $this->stripGarbage();
    }

    /**
     * Strip useless tags
     *
     * @access public
     */
    public function stripGarbage()
    {
        $dom = XmlParser::getDomDocument($this->content);

        if ($dom !== false) {

            $xpath = new DOMXPath($dom);

            foreach ($this->stripTags as $tag) {

                $nodes = $xpath->query('//'.$tag);

                if ($nodes !== false && $nodes->length > 0) {
                    Logger::setMessage(get_called_class().': Strip tag: "'.$tag.'"');
                    foreach ($nodes as $node) {
                        $node->parentNode->removeChild($node);
                    }
                }
            }

            foreach ($this->stripAttributes as $attribute) {

                $nodes = $xpath->query('//*[contains(@class, "'.$attribute.'") or contains(@id, "'.$attribute.'")]');

                if ($nodes !== false && $nodes->length > 0) {
                    Logger::setMessage(get_called_class().': Strip attribute: "'.$attribute.'"');
                    foreach ($nodes as $node) {
                        if ($this->shouldRemove($dom, $node)) {
                            $node->parentNode->removeChild($node);
                        }
                    }
                }
            }

            $this->content = $dom->saveXML($dom->documentElement);
        }
    }

    /**
     * Return false if the node should not be removed
     *
     * @access public
     * @param  DomDocument  $dom
     * @param  DomNode      $node
     * @return boolean
     */
    public function shouldRemove($dom, $node)
    {
        $document_length = strlen($dom->textContent);
        $node_length = strlen($node->textContent);

        if ($document_length === 0) {
            return true;
        }

        $ratio = $node_length * 100 / $document_length;

        if ($ratio >= 90) {
            Logger::setMessage(get_called_class().': Should not remove this node ('.$node->nodeName.') ratio: '.$ratio.'%');
            return false;
        }

        return true;
    }
}
