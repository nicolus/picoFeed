<?php

namespace PicoFeed\Parser;

use SimpleXMLElement;
use PicoFeed\Filter\Filter;
use PicoFeed\Client\Url;

/**
 * RSS 2.0 Parser
 *
 * @author  Frederic Guillot
 * @package Parser
 */
class Rss20 extends Parser
{
    /**
     * Register all supported namespaces
     *
     * Standard RSS 1.0 modules
     *   - Dublin Core (http://purl.org/rss/1.0/modules/dc/)
     *   - Content (http://purl.org/rss/1.0/modules/content/)
     *
     * Additionally we do support:
     *   - Feedburner (http://rssnamespace.org/feedburner/ext/1.0)
     *
     * For broken feeds we do support
     *   - Atom (http://www.w3.org/2005/Atom)
     *
     * @access public
     * @param  SimpleXMLElement          $xml     Feed xml
     * @return SimpleXMLElement
     */
    public function registerSupportedNamespaces(SimpleXMLElement $xml)
    {
        $xml->registerXPathNamespace('dc', 'http://purl.org/rss/1.0/modules/dc/');
        $xml->registerXPathNamespace('content', 'http://purl.org/rss/1.0/modules/content/');
        $xml->registerXPathNamespace('feedburner', 'http://rssnamespace.org/feedburner/ext/1.0');
        $xml->registerXPathNamespace('atom', 'http://www.w3.org/2005/Atom');

        return $xml;
    }

    /**
     * Get the path to the items XML tree
     *
     * @access public
     * @param  SimpleXMLElement   $xml   Feed xml
     * @return SimpleXMLElement[]
     */
    public function getItemsTree(SimpleXMLElement $xml)
    {
        return $xml->xpath('channel/item');
    }

    /**
     * Find the feed url
     *
     * @access public
     * @param  SimpleXMLElement          $xml     Feed xml
     * @param  \PicoFeed\Parser\Feed     $feed    Feed object
     */
    public function findFeedUrl(SimpleXMLElement $xml, Feed $feed)
    {
        $feed->feed_url = '';
    }

    /**
     * Find the site url
     *
     * @access public
     * @param  SimpleXMLElement          $xml     Feed xml
     * @param  \PicoFeed\Parser\Feed     $feed    Feed object
     */
    public function findSiteUrl(SimpleXMLElement $xml, Feed $feed)
    {
        $site_url = $xml->xpath('channel/link');
        $feed->site_url = (string) current($site_url);
    }

    /**
     * Find the feed description
     *
     * @access public
     * @param  SimpleXMLElement          $xml     Feed xml
     * @param  \PicoFeed\Parser\Feed     $feed    Feed object
     */
    public function findFeedDescription(SimpleXMLElement $xml, Feed $feed)
    {
        $description = $xml->xpath('channel/description') ?: $xml->xpath('channel/dc:description');
        $feed->description = (string) current($description);
    }

    /**
     * Find the feed logo url
     *
     * @access public
     * @param  SimpleXMLElement          $xml     Feed xml
     * @param  \PicoFeed\Parser\Feed     $feed    Feed object
     */
    public function findFeedLogo(SimpleXMLElement $xml, Feed $feed)
    {
        $logo = $xml->xpath('channel/image/url');
        $feed->logo = (string) current($logo);
    }

    /**
     * Find the feed icon
     *
     * @access public
     * @param  SimpleXMLElement          $xml     Feed xml
     * @param  \PicoFeed\Parser\Feed     $feed    Feed object
     */
    public function findFeedIcon(SimpleXMLElement $xml, Feed $feed)
    {
        $feed->icon = '';
    }

    /**
     * Find the feed title
     *
     * @access public
     * @param  SimpleXMLElement          $xml     Feed xml
     * @param  \PicoFeed\Parser\Feed     $feed    Feed object
     */
    public function findFeedTitle(SimpleXMLElement $xml, Feed $feed)
    {
        $title = $xml->xpath('channel/title') ?: $xml->xpath('channel/dc:title');
        $feed->title = Filter::stripWhiteSpace((string) current($title)) ?: $feed->getSiteUrl();
    }

    /**
     * Find the feed language
     *
     * @access public
     * @param  SimpleXMLElement          $xml     Feed xml
     * @param  \PicoFeed\Parser\Feed     $feed    Feed object
     */
    public function findFeedLanguage(SimpleXMLElement $xml, Feed $feed)
    {
        $language = $xml->xpath('channel/language') ?: $xml->xpath('channel/dc:language');
        $feed->language = (string) current($language);
    }

    /**
     * Find the feed id
     *
     * @access public
     * @param  SimpleXMLElement          $xml     Feed xml
     * @param  \PicoFeed\Parser\Feed     $feed    Feed object
     */
    public function findFeedId(SimpleXMLElement $xml, Feed $feed)
    {
        $feed->id = $feed->getFeedUrl() ?: $feed->getSiteUrl();
    }

    /**
     * Find the feed date
     *
     * @access public
     * @param  SimpleXMLElement          $xml     Feed xml
     * @param  \PicoFeed\Parser\Feed     $feed    Feed object
     */
    public function findFeedDate(SimpleXMLElement $xml, Feed $feed)
    {
        $date = $xml->xpath('channel/pubDate')
                ?: $xml->xpath('channel/lastBuildDate')
                ?: $xml->xpath('channel/dc:date')
                ?: $xml->xpath('channel/date');

        $feed->date = $this->date->getDateTime((string) current($date));
    }

    /**
     * Find the item date
     *
     * @access public
     * @param  SimpleXMLElement          $entry   Feed item
     * @param  Item                      $item    Item object
     * @param  \PicoFeed\Parser\Feed     $feed    Feed object
     */
    public function findItemDate(SimpleXMLElement $entry, Item $item, Feed $feed)
    {
        $date = $entry->xpath('pubDate')
                ?: $entry->xpath('dc:date')
                ?: $entry->xpath('date');

        if (count($date) > 0) {
            $date = $this->date->getDateTime((string) current($date));
        }
        else {
            $date = $feed->getDate();
        }

        $item->date = $date;
    }

    /**
     * Find the item title
     *
     * @access public
     * @param  SimpleXMLElement          $entry   Feed item
     * @param  \PicoFeed\Parser\Item     $item    Item object
     */
    public function findItemTitle(SimpleXMLElement $entry, Item $item)
    {
        // TODO: use $this->findItemUrl instead of $item->url; removes the
        // depenency on call order and is more obvious
        $title = $entry->xpath('title') ?: $entry->xpath('dc:title');
        $item->title = Filter::stripWhiteSpace((string) current($title)) ?: (string) $item->url;
    }

    /**
     * Find the item author
     *
     * @access public
     * @param  SimpleXMLElement          $xml     Feed
     * @param  SimpleXMLElement          $entry   Feed item
     * @param  \PicoFeed\Parser\Item     $item    Item object
     */
    public function findItemAuthor(SimpleXMLElement $xml, SimpleXMLElement $entry, Item $item)
    {
        $author = $entry->xpath('author')
                ?: $entry->xpath('dc:creator')
                ?: $entry->xpath('creator')
                ?: $xml->xpath('channel/webMaster')
                ?: $xml->xpath('channel/managingEditor');

        $item->author = (string) current($author);
    }

    /**
     * Find the item content
     *
     * @access public
     * @param  SimpleXMLElement          $entry   Feed item
     * @param  \PicoFeed\Parser\Item     $item    Item object
     */
    public function findItemContent(SimpleXMLElement $entry, Item $item)
    {
        $content = $entry->xpath('content:encoded') ?: $entry->xpath('encoded');

        if (trim((string) current($content)) === '') {
            $content = $entry->xpath('description') ?: $entry->xpath('dc:description');
        }

        $item->content = (string) current($content);
    }

    /**
     * Find the item URL
     *
     * @access public
     * @param  SimpleXMLElement          $entry   Feed item
     * @param  \PicoFeed\Parser\Item     $item    Item object
     */
    public function findItemUrl(SimpleXMLElement $entry, Item $item)
    {
        $links = $entry->xpath('link')
                ?: $entry->xpath('feedburner:origLink')
                ?: $entry->xpath('atom:link/@href')
                ?: $entry->xpath('origLink')
                ?: $entry->xpath('link/@href');

        foreach ($links as $link) {
            $link = (string) $link;

            if ($link !== '' && filter_var($link, FILTER_VALIDATE_URL) !== false) {
                $item->url = $link;
                break;
            }
        }
    }

    /**
     * Genereate the item id
     *
     * @access public
     * @param  SimpleXMLElement          $entry   Feed item
     * @param  \PicoFeed\Parser\Item     $item    Item object
     * @param  \PicoFeed\Parser\Feed     $feed    Feed object
     */
    public function findItemId(SimpleXMLElement $entry, Item $item, Feed $feed)
    {
        $id = $entry->xpath('guid')
                ?: $entry->xpath('dc:identifier')
                ?: $entry->xpath('identifier');

        if (count($id) > 0) {
            $item->id = $this->generateId((string) current($id));
        }
        else {
            $item->id = $this->generateId(
                $item->getTitle(), $item->getUrl(), $item->getContent()
            );
        }
    }

    /**
     * Find the item enclosure
     *
     * @access public
     * @param  SimpleXMLElement          $entry   Feed item
     * @param  \PicoFeed\Parser\Item     $item    Item object
     * @param  \PicoFeed\Parser\Feed     $feed    Feed object
     */
    public function findItemEnclosure(SimpleXMLElement $entry, Item $item, Feed $feed)
    {
        // TODO: register Namespaces
        $url = $entry->xpath('feedburner:origEnclosureLink')
                ?: $entry->xpath('enclosure/@url')
                ?: $entry->xpath('origEnclosureLink');

        $type = $entry->xpath('enclosure/@type');

        $item->enclosure_url = Url::resolve((string) current($url), $feed->getSiteUrl());
        $item->enclosure_type = (string) current($type);
    }

    /**
     * Find the item language
     *
     * @access public
     * @param  SimpleXMLElement   $entry   Feed item
     * @param  \PicoFeed\Parser\Item     $item    Item object
     * @param  \PicoFeed\Parser\Feed     $feed    Feed object
     */
    public function findItemLanguage(SimpleXMLElement $entry, Item $item, Feed $feed)
    {
        $language = $entry->xpath('dc:language') ?: $entry->xpath('language');
        $item->language = (string) current($language) ?: $feed->language;
    }
}
