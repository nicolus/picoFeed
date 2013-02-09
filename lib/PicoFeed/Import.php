<?php

namespace PicoFeed;

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
        try {

            $xml = new \SimpleXMLElement($this->content);

            foreach ($xml->body->outline as $item) {

                $entry = new \StdClass;
                $entry->title = (string) $item['text'];
                $entry->site_url = (string) $item['htmlUrl'];
                $entry->feed_url = (string) $item['xmlUrl'];
                $entry->type = (string) $item['version'];
                $entry->description = (string) $item['description'];
                $this->items[] = $entry;
            }
        }
        catch (\Exception $e) {

        }

        return $this->items;
    }
}