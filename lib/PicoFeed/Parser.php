<?php

namespace PicoFeed;

abstract class Parser
{
    protected $content = '';

    public $id = '';
    public $url = '';
    public $title = '';
    public $updated = '';
    public $items = array();


    abstract public function execute();


    public function __construct($content)
    {
        $this->content = $content;
    }
}


class Atom extends Parser
{
    public function execute()
    {
        try {

            $xml = new \SimpleXMLElement($this->content);

            $this->url = $this->getUrl($xml);
            $this->title = (string) $xml->title;
            $this->id = (string) $xml->id;
            $this->updated = strtotime((string) $xml->updated);
            $author = (string) $xml->author->name;

            foreach ($xml->entry as $entry) {

                if (isset($entry->author->name)) {

                    $author = $entry->author->name;
                }

                $item = new \StdClass;
                $item->id = (string) $entry->id;
                $item->title = (string) $entry->title;
                $item->url = $this->getUrl($entry);
                $item->updated = strtotime((string) $entry->updated);
                $item->content = isset($entry->content) ? (string) $entry->content : (string) $entry->summary;
                $item->author = $author;

                $this->items[] = $item;
            }
        }
        catch (\Exception $e) {

        }

        return $this;
    }


    public function getUrl($xml)
    {
        foreach ($xml->link as $link) {

            if ((string) $link['type'] === 'text/html') {

                return (string) $link['href'];
            }
        }

        return (string) $xml->link['href'];
    }
}


class Rss20 extends Parser
{
    public function execute()
    {
        try {

            $xml = new \SimpleXMLElement($this->content);
            $ns = $xml->getNamespaces(true);

            $this->title = (string) $xml->channel->title;
            $this->url = (string) $xml->channel->link;
            $this->id = $this->url;
            $this->updated = isset($xml->channel->pubDate) ? (string) $xml->channel->pubDate : (string) $xml->channel->lastBuildDate;
            $this->updated = strtotime($this->updated);

            foreach ($xml->channel->item as $entry) {

                $author = '';
                $content = '';

                if (isset($ns['dc'])) {

                    $ns_dc = $entry->children($ns['dc']);
                    $author = (string) $ns_dc->creator;
                }

                if (isset($ns['content'])) {

                    $ns_content = $entry->children($ns['content']);
                    $content = (string) $ns_content->encoded;
                }

                if (! $content) {

                    $content = (string) $entry->description;
                }

                $item = new \StdClass;
                $item->id = (string) $entry->guid;
                $item->title = (string) $entry->title;
                $item->url = (string) $entry->link;
                $item->updated = strtotime((string) $entry->pubDate);
                $item->content = $content;
                $item->author = $author ?: (string) $xml->channel->webMaster;

                $this->items[] = $item;
            }
        }
        catch (\Exception $e) {

        }

        return $this;
    }
}
