<?php

namespace PicoFeed;

use DOMXpath;
use PicoFeed\Config;

/**
 * Favicon class
 *
 * https://en.wikipedia.org/wiki/Favicon
 *
 * @author  Frederic Guillot
 * @package picofeed
 */
class Favicon
{
    /**
     * Config class instance
     *
     * @access private
     * @var \PicoFeed\Config
     */
    private $config = null;

    /**
     * Icon content
     *
     * @access private
     * @var string
     */
    private $content = '';

    /**
     * Constructor
     *
     * @access public
     * @param  \PicoFeed\Config   $config   Config class instance
     */
    public function __construct(Config $config = null)
    {
        $this->config = $config ?: new Config;
    }

    /**
     * Get the icon file content (available only after the download)
     *
     * @access public
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Download and check if a resource exists
     *
     * @access public
     * @param  string    $url    URL
     * @return string            Resource content
     */
    public function download($url)
    {
        Logging::setMessage(get_called_class().' Download => '.$url);

        $client = Client::getInstance();
        $client->setConfig($this->config);

        if ($client->execute($url) && ! $client->isNotFound()) {
            return $client->getContent();
        }

        return '';
    }

    /**
     * Check if a remote file exists
     *
     * @access public
     * @param  string    $url    URL
     * @return boolean
     */
    public function exists($url)
    {
        return $this->download($url) !== '';
    }

    /**
     * Get the icon link for a website
     *
     * @access public
     * @param  string    $link    URL
     * @return string
     */
    public function find($link)
    {
        $url = new Url($link);

        $icons = $this->extract($this->download($url->getBaseUrl('/')));
        $icons[] = $url->getBaseUrl('/favicon.ico');

        foreach ($icons as $icon_link) {

            $icon_url = new Url($icon_link);
            $icon_link = $icon_url->getAbsoluteUrl($icon_url->isRelativeUrl() ? $url->getBaseUrl() : '');
            $this->content = $this->download($icon_link);

            if ($this->content !== '') {
                return $icon_link;
            }
        }

        return '';
    }

    /**
     * Extract the icon links from the HTML
     *
     * @access public
     * @param  string     $html     HTML
     * @return array
     */
    public function extract($html)
    {
        $icons = array();

        if (empty($html)) {
            return $icons;
        }

        $dom = XmlParser::getHtmlDocument($html);

        $xpath = new DOMXpath($dom);
        $elements = $xpath->query("//link[contains(@rel, 'icon') and not(contains(@rel, 'apple'))]");

        for ($i = 0; $i < $elements->length; $i++) {
            $icons[] = $elements->item($i)->getAttribute('href');
        }

        return $icons;
    }
}
