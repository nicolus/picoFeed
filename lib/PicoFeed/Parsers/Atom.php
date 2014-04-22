<?php

namespace PicoFeed\Parsers;

use PicoFeed\Parser;
use PicoFeed\XmlParser;
use PicoFeed\Logging;
use PicoFeed\Filter;

/**
 * Atom parser
 *
 * @author  Frederic Guillot
 * @package parser
 */
class Atom extends Parser
{
    /**
     * Parse the document
     *
     * @access public
     * @return mixed   Atom instance or false
     */
    public function execute()
    {
        Logging::log(get_called_class().': begin parsing');

        $xml = XmlParser::getSimpleXml($this->content);

        if ($xml === false) {
            Logging::log(get_called_class().': XML parsing error');
            Logging::log(XmlParser::getErrors());
            return false;
        }

        $this->language = $this->getXmlLang($this->content);
        $this->url = $this->getUrl($xml);
        $this->title = $this->stripWhiteSpace((string) $xml->title) ?: $this->url;
        $this->id = (string) $xml->id;
        $this->updated = $this->parseDate((string) $xml->updated);
        $author = (string) $xml->author->name;

        Logging::log(\get_called_class().': Title => '.$this->title);
        Logging::log(\get_called_class().': Url => '.$this->url);

        foreach ($xml->entry as $entry) {

            if (isset($entry->author->name)) {
                $author = (string) $entry->author->name;
            }

            $id = (string) $entry->id;

            $item = new \StdClass;
            $item->url = $this->getUrl($entry);
            $item->id = $this->generateId($id !== $item->url ? $id : $item->url, $this->isExcludedFromId($this->url) ? '' : $this->url);
            $item->title = $this->stripWhiteSpace((string) $entry->title);
            $item->updated = $this->parseDate((string) $entry->updated);
            $item->author = $author;
            $item->content = $this->filterHtml($this->getContent($entry), $item->url);
            $item->language = $this->language;

            if (empty($item->title)) $item->title = $item->url;

            // Try to find an enclosure
            foreach ($entry->link as $link) {
                if ((string) $link['rel'] === 'enclosure') {
                    $item->enclosure = (string) $link['href'];
                    $item->enclosure_type = (string) $link['type'];

                    if (Filter::isRelativePath($item->enclosure)) {
                        $item->enclosure = Filter::getAbsoluteUrl($item->enclosure, $this->url);
                    }
                    break;
                }
            }

            $this->items[] = $item;
        }

        Logging::log(get_called_class().': parsing finished ('.count($this->items).' items)');

        return $this;
    }

    /**
     * Get the entry content
     *
     * @access public
     * @param  SimpleXMLElement $entry XML Entry
     * @return string
     */
    public function getContent($entry)
    {
        if (isset($entry->content) && ! empty($entry->content)) {

            if (count($entry->content->children())) {
                return (string) $entry->content->asXML();
            }
            else {
                return (string) $entry->content;
            }
        }
        else if (isset($entry->summary) && ! empty($entry->summary)) {
            return (string) $entry->summary;
        }

        return '';
    }

    /**
     * Get the URL from a link tag
     *
     * @access public
     * @param  SimpleXMLElement $xml XML tag
     * @return string
     */
    public function getUrl($xml)
    {
        foreach ($xml->link as $link) {
            if ((string) $link['type'] === 'text/html' || (string) $link['type'] === 'application/xhtml+xml') {
                return (string) $link['href'];
            }
        }

        return (string) $xml->link['href'];
    }
}