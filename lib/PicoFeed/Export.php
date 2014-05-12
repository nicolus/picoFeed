<?php

namespace PicoFeed;

use SimpleXMLElement;

/**
 * OPML export class
 *
 * @author  Frederic Guillot
 * @package picofeed
 */
class Export
{
    /**
     * List of feeds to exports
     *
     * @access private
     * @var array
     */
    private $content = array();

    /**
     * List of required properties for each feed
     *
     * @access private
     * @var array
     */
    private $required_fields = array(
        'title',
        'site_url',
        'feed_url',
    );

    /**
     * Constructor
     *
     * @access public
     * @param  array   $content   List of feeds
     */
    public function __construct(array $content)
    {
        $this->content = $content;
    }

    /**
     * Get the OPML document
     *
     * @access public
     * @return string
     */
    public function execute()
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><opml/>');

        $head = $xml->addChild('head');
        $head->addChild('title', 'OPML Export');

        $body = $xml->addChild('body');

        foreach ($this->content as $feed) {

            $valid = true;

            foreach ($this->required_fields as $field) {

                if (! isset($feed[$field])) {
                    $valid = false;
                    break;
                }
            }

            if (! $valid) {
                continue;
            }

            $outline = $body->addChild('outline');
            $outline->addAttribute('xmlUrl', $feed['feed_url']);
            $outline->addAttribute('htmlUrl', $feed['site_url']);
            $outline->addAttribute('title', $feed['title']);
            $outline->addAttribute('text', $feed['title']);
            $outline->addAttribute('description', isset($feed['description']) ? $feed['description'] : $feed['title']);
            $outline->addAttribute('type', 'rss');
            $outline->addAttribute('version', 'RSS');
        }

        return $xml->asXML();
    }
}
