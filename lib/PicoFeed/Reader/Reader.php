<?php

namespace PicoFeed\Reader;

use DOMXPath;
use GuzzleHttp\ClientInterface;
use PicoFeed\Base;
use PicoFeed\Client\Client;
use PicoFeed\Client\Url;
use PicoFeed\Logging\Logger;
use PicoFeed\Parser\XmlParser;

/**
 * Reader class.
 *
 * @author  Frederic Guillot
 */
class Reader extends Base
{
    /**
     * Feed formats for detection.
     *
     * @var array
     */
    private $formats = [
        'Atom' => '//feed',
        'Rss20' => '//rss[@version="2.0"]',
        'Rss92' => '//rss[@version="0.92"]',
        'Rss91' => '//rss[@version="0.91"]',
        'Rss10' => '//rdf',
    ];
    /**
     * Download a feed (no discovery).
     *
     * @param string $url Feed url
     *
     * @return \PicoFeed\Client\Client
     */
    public function download($url)
    {
        $url = $this->prependScheme($url);

        return $this->client->execute($url);
    }

    /**
     * Discover and download a feed.
     *
     * @param string $url Feed or website url
     * @return Client
     * @throws SubscriptionNotFoundException
     */
    public function discover($url)
    {
        $client = $this->download($url);

        // It's already a feed or the feed was not modified
        if (!$client->isModified() || $this->detectFormat($client->getContent())) {
            return $client;
        }

        // Try to find a subscription
        $links = $this->find($client->getUrl(), $client->getContent());

        if (empty($links)) {
            throw new SubscriptionNotFoundException('Unable to find a subscription');
        }

        return $this->download($links[0]);
    }

    /**
     * Find feed urls inside a HTML document.
     *
     * @param string $url Website url
     * @param string $html HTML content
     *
     * @return array List of feed links
     */
    public function find($url, $html)
    {
        Logger::setMessage(get_called_class() . ': Try to discover subscriptions');

        $dom = XmlParser::getHtmlDocument($html);
        $xpath = new DOMXPath($dom);
        $links = [];

        $queries = [
            '//link[@type="application/rss+xml"]',
            '//link[@type="application/atom+xml"]',
        ];

        foreach ($queries as $query) {
            $nodes = $xpath->query($query);

            foreach ($nodes as $node) {
                $link = $node->getAttribute('href');

                if (!empty($link)) {
                    $feedUrl = new Url($link);
                    $siteUrl = new Url($url);

                    $links[] = $feedUrl->getAbsoluteUrl($feedUrl->isRelativeUrl() ? $siteUrl->getBaseUrl() : '');
                }
            }
        }

        Logger::setMessage(get_called_class() . ': ' . implode(', ', $links));

        return $links;
    }

    /**
     * Get a parser instance.
     *
     * @param string $url Site url
     * @param string $content Feed content
     * @param string $encoding HTTP encoding
     * @return \PicoFeed\Parser\Parser
     * @throws UnsupportedFeedFormatException
     */
    public function getParser($url, $content, $encoding)
    {
        $format = $this->detectFormat($content);

        if (empty($format)) {
            throw new UnsupportedFeedFormatException('Unable to detect feed format');
        }

        $className = '\PicoFeed\Parser\\' . $format;

        /** @var \PicoFeed\Parser\Parser $parser */
        $parser = new $className($content, $encoding, $url);
        $parser->setHashAlgo($this->config->getParserHashAlgo());
        $parser->setConfig($this->config);

        return $parser;
    }

    /**
     * Detect the feed format.
     *
     * @param string $content Feed content
     * @return string
     */
    public function detectFormat($content)
    {
        $dom = XmlParser::getHtmlDocument($content);
        $xpath = new DOMXPath($dom);

        foreach ($this->formats as $parser_name => $query) {
            $nodes = $xpath->query($query);

            if ($nodes->length === 1) {
                return $parser_name;
            }
        }

        return '';
    }

    /**
     * Add the prefix "http://" if the end-user just enter a domain name.
     *
     * @param string $url Url
     * @return string
     */
    public function prependScheme($url)
    {
        if (!preg_match('%^https?://%', $url)) {
            $url = 'http://' . $url;
        }

        return $url;
    }
}
