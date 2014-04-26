<?php

namespace PicoFeed;

require_once __DIR__.'/Logging.php';
require_once __DIR__.'/XmlParser.php';

use PicoFeed\Logging;
use PicoFeed\XmlParser;

/**
 * OPML Import
 *
 * @author  Frederic Guillot
 * @package picofeed
 */
class Import
{
    /**
     * OPML file content
     *
     * @access private
     * @var string
     */
    private $content = '';

    /**
     * Subscriptions
     *
     * @access private
     * @var array
     */
    private $items = array();

    /**
     * Constructor
     *
     * @access public
     * @param  string  $content   OPML file content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * Parse the OPML file
     *
     * @access public
     * @return array|false
     */
    public function execute()
    {
        Logging::setMessage(get_called_class().': start importation');

        $xml = XmlParser::getSimpleXml(trim($this->content));

        if ($xml === false || $xml->getName() !== 'opml' || ! isset($xml->body)) {
            Logging::setMessage(get_called_class().': OPML tag not found or malformed XML document');
            return false;
        }

        $this->parseEntries($xml->body);
        Logging::setMessage(get_called_class().': '.count($this->items).' subscriptions found');

        return $this->items;
    }

    /**
     * Parse each entries of the subscription list
     *
     * @access public
     * @param  SimpleXMLElement   $tree   XML node
     */
    public function parseEntries($tree)
    {
        if (isset($tree->outline)) {

            foreach ($tree->outline as $item) {

                if (isset($item->outline)) {

                    $this->parseEntries($item);
                }
                else if ((isset($item['text']) || isset($item['title'])) && isset($item['xmlUrl'])) {

                    $entry = new \StdClass;
                    $entry->category = isset($tree['title']) ? (string) $tree['title'] : (string) $tree['text'];
                    $entry->title = isset($item['title']) ? (string) $item['title'] : (string) $item['text'];
                    $entry->feed_url = (string) $item['xmlUrl'];
                    $entry->site_url = isset($item['htmlUrl']) ? (string) $item['htmlUrl'] : $entry->feed_url;
                    $entry->type = isset($item['version']) ? (string) $item['version'] : isset($item['type']) ? (string) $item['type'] : 'rss';
                    $entry->description = isset($item['description']) ? (string) $item['description'] : $entry->title;
                    $this->items[] = $entry;
                }
            }
        }
    }
}
