<?php

namespace PicoFeed\Parsers;

use PicoFeed\Parser;
use PicoFeed\XmlParser;
use PicoFeed\Logging;

/**
 * RSS 1.0 parser
 *
 * @author  Frederic Guillot
 * @package parser
 */
class Rss10 extends Parser
{
    public function execute()
    {
        Logging::log(get_called_class().': begin parsing');

        $xml = XmlParser::getSimpleXml($this->content);

        if ($xml === false) {
            Logging::log(get_called_class().': XML parsing error');
            Logging::log(XmlParser::getErrors());
            return false;
        }

        $namespaces = $xml->getNamespaces(true);

        $this->title = $this->stripWhiteSpace((string) $xml->channel->title) ?: $this->url;
        $this->url = (string) $xml->channel->link;
        $this->id = $this->url;
        $this->language = '';

        Logging::log(get_called_class().': Title => '.$this->title);
        Logging::log(get_called_class().': Url => '.$this->url);

        if (isset($namespaces['dc'])) {
            $ns_dc = $xml->channel->children($namespaces['dc']);
            $this->updated = isset($ns_dc->date) ? $this->parseDate($ns_dc->date) : time();
        }
        else {
            $this->updated = time();
        }

        foreach ($xml->item as $entry) {

            $item = new \StdClass;
            $item->title = $this->stripWhiteSpace((string) $entry->title);
            $item->url = '';
            $item->author= '';
            $item->updated = '';
            $item->content = '';
            $item->language = '';

            foreach ($namespaces as $name => $url) {

                $namespace = $entry->children($namespaces[$name]);

                if (! $item->url && ! empty($namespace->origLink)) $item->url = (string) $namespace->origLink;
                if (! $item->author && ! empty($namespace->creator)) $item->author = (string) $namespace->creator;
                if (! $item->updated && ! empty($namespace->date)) $item->updated = $this->parseDate((string) $namespace->date);
                if (! $item->updated && ! empty($namespace->updated)) $item->updated = $this->parseDate((string) $namespace->updated);
                if (! $item->content && ! empty($namespace->encoded)) $item->content = (string) $namespace->encoded;
            }

            if (empty($item->url)) $item->url = (string) $entry->link;
            if (empty($item->updated)) $item->updated = $this->updated;

            if (empty($item->content)) {
                $item->content = isset($entry->description) ? (string) $entry->description : '';
            }

            if (empty($item->author)) {

                if (isset($entry->author)) {
                    $item->author = (string) $entry->author;
                }
                else if (isset($xml->channel->webMaster)) {
                    $item->author = (string) $xml->channel->webMaster;
                }
            }

            if (empty($item->title)) $item->title = $item->url;

            $item->id = $this->generateId($item->url, $this->isExcludedFromId($this->url) ? '' : $this->url);
            $item->content = $this->filterHtml($item->content, $item->url);
            $this->items[] = $item;
        }

        Logging::log(get_called_class().': parsing finished ('.count($this->items).' items)');

        return $this;
    }
}