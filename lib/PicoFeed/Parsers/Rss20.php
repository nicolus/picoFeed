<?php

namespace PicoFeed\Parsers;

use SimpleXMLElement;
use PicoFeed\Parser;
use PicoFeed\XmlParser;
use PicoFeed\Logging;
use PicoFeed\Filter;
use PicoFeed\Feed;
use PicoFeed\Item;

/**
 * RSS 2.0 Parser
 *
 * @author  Frederic Guillot
 * @package parser
 */
class Rss20 extends Parser
{
    /**
     * Get the path to the items XML tree
     *
     * @access public
     * @param  SimpleXMLElement   $xml   Feed xml
     * @return SimpleXMLElement
     */
    public function getItemsTree(SimpleXMLElement $xml)
    {
        return $xml->channel->item;
    }

    /**
     * Find the feed url
     *
     * @access public
     * @param  SimpleXMLElement   $xml     Feed xml
     * @param  \PicoFeed\Feed     $feed    Feed object
     */
    public function findFeedUrl(SimpleXMLElement $xml, Feed $feed)
    {
        if ($xml->channel->link && $xml->channel->link->count() > 1) {

            foreach ($xml->channel->link as $xml_link) {

                $link = (string) $xml_link;

                if ($link !== '') {
                    $feed->url = $link;
                    break;
                }
            }
        }
        else {

            $feed->url = (string) $xml->channel->link;
        }
    }

    /**
     * Find the feed title
     *
     * @access public
     * @param  SimpleXMLElement   $xml     Feed xml
     * @param  \PicoFeed\Feed     $feed    Feed object
     */
    public function findFeedTitle(SimpleXMLElement $xml, Feed $feed)
    {
        $feed->title = $this->stripWhiteSpace((string) $xml->channel->title) ?: $feed->url;
    }

    /**
     * Find the feed language
     *
     * @access public
     * @param  SimpleXMLElement   $xml     Feed xml
     * @param  \PicoFeed\Feed     $feed    Feed object
     */
    public function findFeedLanguage(SimpleXMLElement $xml, Feed $feed)
    {
        $feed->language = isset($xml->channel->language) ? (string) $xml->channel->language : '';
    }

    /**
     * Find the feed id
     *
     * @access public
     * @param  SimpleXMLElement   $xml     Feed xml
     * @param  \PicoFeed\Feed     $feed    Feed object
     */
    public function findFeedId(SimpleXMLElement $xml, Feed $feed)
    {
        $feed->id = $feed->url;
    }

    /**
     * Find the feed date
     *
     * @access public
     * @param  SimpleXMLElement   $xml     Feed xml
     * @param  \PicoFeed\Feed     $feed    Feed object
     */
    public function findFeedDate(SimpleXMLElement $xml, Feed $feed)
    {
        $date = isset($xml->channel->pubDate) ? $xml->channel->pubDate : $xml->channel->lastBuildDate;
        $feed->date = $this->parseDate((string) $date);
    }

    /**
     * Find the item date
     *
     * @access public
     * @param  SimpleXMLElement   $entry   Feed item
     * @param  \PicoFeed\Item     $item    Item object
     */
    public function findItemDate(SimpleXMLElement $entry, Item $item)
    {
        $date = $this->getNamespaceValue($entry, $this->namespaces, 'date');

        if (empty($date)) {
            $date = $this->getNamespaceValue($entry, $this->namespaces, 'updated');
        }

        if (empty($date)) {
            $date = (string) $entry->pubDate;
        }

        $item->date = $this->parseDate($date);
    }

    /**
     * Find the item title
     *
     * @access public
     * @param  SimpleXMLElement   $entry   Feed item
     * @param  \PicoFeed\Item     $item    Item object
     */
    public function findItemTitle(SimpleXMLElement $entry, Item $item)
    {
        $item->title = $this->stripWhiteSpace((string) $entry->title);

        if (empty($item->title)) {
            $item->title = $item->url;
        }
    }

    /**
     * Find the item author
     *
     * @access public
     * @param  SimpleXMLElement   $xml     Feed
     * @param  SimpleXMLElement   $entry   Feed item
     * @param  \PicoFeed\Item     $item    Item object
     */
    public function findItemAuthor(SimpleXMLElement $xml, SimpleXMLElement $entry, Item $item)
    {
        $item->author = $this->getNamespaceValue($entry, $this->namespaces, 'creator');

        if (empty($item->author)) {
            if (isset($entry->author)) {
                $item->author = (string) $entry->author;
            }
            else if (isset($xml->channel->webMaster)) {
                $item->author = (string) $xml->channel->webMaster;
            }
        }
    }

    /**
     * Find the item content
     *
     * @access public
     * @param  SimpleXMLElement   $entry   Feed item
     * @param  \PicoFeed\Item     $item    Item object
     */
    public function findItemContent(SimpleXMLElement $entry, Item $item)
    {
        $content = $this->getNamespaceValue($entry, $this->namespaces, 'encoded');

        if (empty($content) && $entry->description->count() > 0) {
            $content = (string) $entry->description;
        }

        $item->content = $this->filterHtml($content, $item->url);
    }

    /**
     * Find the item URL
     *
     * @access public
     * @param  SimpleXMLElement   $entry   Feed item
     * @param  \PicoFeed\Item     $item    Item object
     */
    public function findItemUrl(SimpleXMLElement $entry, Item $item)
    {
        $links = array(
            $this->getNamespaceValue($entry, $this->namespaces, 'origLink'),
            isset($entry->link) ? (string) $entry->link : '',
            $this->getNamespaceValue($entry, $this->namespaces, 'link', 'href'),
            isset($entry->guid) ? (string) $entry->guid : '',
        );

        foreach ($links as $link) {
            if (! empty($link) && filter_var($link, FILTER_VALIDATE_URL) !== false) {
                $item->url = $link;
                break;
            }
        }
    }

    /**
     * Genereate the item id
     *
     * @access public
     * @param  SimpleXMLElement   $entry   Feed item
     * @param  \PicoFeed\Item     $item    Item object
     * @param  \PicoFeed\Feed     $feed    Feed object
     */
    public function findItemId(SimpleXMLElement $entry, Item $item, Feed $feed)
    {
        $item_permalink = $item->url;

        if ($this->isExcludedFromId($feed->url)) {
            $feed_permalink = '';
        }
        else {
            $feed_permalink = $feed->url;
        }

        if ($entry->guid->count() > 0 && ((string) $entry->guid['isPermaLink'] === 'false' || ! isset($entry->guid['isPermaLink']))) {
            $item->id = $this->generateId($item_permalink,  $feed_permalink, (string) $entry->guid);
        }
        else {
            $item->id = $this->generateId($item_permalink,  $feed_permalink);
        }
    }

    /**
     * Find the item enclosure
     *
     * @access public
     * @param  SimpleXMLElement   $entry   Feed item
     * @param  \PicoFeed\Item     $item    Item object
     * @param  \PicoFeed\Feed     $feed    Feed object
     */
    public function findItemEnclosure(SimpleXMLElement $entry, Item $item, Feed $feed)
    {
        if (isset($entry->enclosure)) {

            $item->enclosure_url = $this->getNamespaceValue($entry->enclosure, $this->namespaces, 'origEnclosureLink');

            if (empty($item->enclosure_url)) {
                $item->enclosure_url = isset($entry->enclosure['url']) ? (string) $entry->enclosure['url'] : '';
            }

            $item->enclosure_type = isset($entry->enclosure['type']) ? (string) $entry->enclosure['type'] : '';

            if (Filter::isRelativePath($item->enclosure_url)) {
                $item->enclosure_url = Filter::getAbsoluteUrl($item->enclosure_url, $feed->url);
            }
        }
    }

    /**
     * Find the item language
     *
     * @access public
     * @param  SimpleXMLElement   $entry   Feed item
     * @param  \PicoFeed\Item     $item    Item object
     * @param  \PicoFeed\Feed     $feed    Feed object
     */
    public function findItemLanguage(SimpleXMLElement $entry, Item $item, Feed $feed)
    {
        $item->language = $feed->language;
    }
}
