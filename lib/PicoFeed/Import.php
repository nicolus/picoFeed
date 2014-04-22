<?php

namespace PicoFeed;

require_once __DIR__.'/Logging.php';
require_once __DIR__.'/XmlParser.php';

use PicoFeed\Logging;
use PicoFeed\XmlParser;

class Import
{
    private $content = '';
    private $items = array();


    public function __construct($content)
    {
        $this->content = $content;
    }


    public function execute()
    {
        Logging::log(get_called_class().': start importation');

        $xml = XmlParser::getSimpleXml(trim($this->content));

        if ($xml === false || $xml->getName() !== 'opml' || ! isset($xml->body)) {
            Logging::log(\get_called_class().': OPML tag not found or malformed XML document');
            return false;
        }

        $this->parseEntries($xml->body);
        Logging::log(get_called_class().': '.count($this->items).' subscriptions found');

        return $this->items;
    }


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