<?php

require_once 'lib/PicoFeed/Reader.php';
require_once 'lib/PicoFeed/Parser.php';

use PicoFeed\Reader;

class ReaderTest extends PHPUnit_Framework_TestCase
{
    public function testDownload()
    {
        $reader = new Reader;
        $feed = $reader->download('http://wordpress.org/news/feed/')->getContent();
        $this->assertNotEmpty($feed);
    }


    public function testDownloadWithCache()
    {
        $reader = new Reader;
        $resource = $reader->download('http://petitcodeur.fr/feed.xml');
        $this->assertTrue($resource->isModified());

        $lastModified = $resource->getLastModified();
        $etag = $resource->getEtag();

        $reader = new Reader;
        $resource = $reader->download('http://petitcodeur.fr/feed.xml', $lastModified, $etag);
        $this->assertFalse($resource->isModified());
    }


    public function testDetectFormat()
    {
        $reader = new Reader(file_get_contents('tests/fixtures/rss_0.92.xml'));
        $this->assertInstanceOf('PicoFeed\Rss92', $reader->getParser());

        $reader = new Reader(file_get_contents('tests/fixtures/rss_0.91.xml'));
        $this->assertInstanceOf('PicoFeed\Rss91', $reader->getParser());

        $reader = new Reader(file_get_contents('tests/fixtures/planete-jquery.xml'));
        $this->assertInstanceOf('PicoFeed\Rss10', $reader->getParser());

        $reader = new Reader(file_get_contents('tests/fixtures/rss2sample.xml'));
        $this->assertInstanceOf('PicoFeed\Rss20', $reader->getParser());

        $reader = new Reader(file_get_contents('tests/fixtures/atomsample.xml'));
        $this->assertInstanceOf('PicoFeed\Atom', $reader->getParser());

        $reader = new Reader;
        $this->assertFalse($reader->getParser());

        $reader = new Reader('<?xml version="1.0" encoding="UTF-8"?>
<?xml-stylesheet type="text/xsl" media="screen" href="/~d/styles/rss2titles.xsl"?><?xml-stylesheet type="text/css" media="screen" href="http://feeds.feedburner.com/~d/styles/itemtitles.css"?><rss xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:slash="http://purl.org/rss/1.0/modules/slash/" xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" xmlns:media="http://search.yahoo.com/mrss/" xmlns:geo="http://www.w3.org/2003/01/geo/wgs84_pos#" xmlns:feedburner="http://rssnamespace.org/feedburner/ext/1.0" version="2.0">');

        $this->assertInstanceOf('PicoFeed\Rss20', $reader->getParser());
    }


    public function testRemoteDetection()
    {
        $reader = new Reader;
        $reader->download('http://planete-jquery.fr');

        $this->assertTrue($reader->discover());
    }


    public function testFeedsReportedAsNotWorking()
    {
        $reader = new Reader;
        $reader->download('http://fulltextrssfeed.com/www.numerama.com/rss/news.rss');
        $this->assertInstanceOf('PicoFeed\Rss20', $reader->getParser());

        $reader = new Reader;
        $reader->download('http://www.trictrac.net/rss/TricTracRss.php');
        $this->assertInstanceOf('PicoFeed\Rss20', $reader->getParser());

        $reader = new Reader(file_get_contents('tests/fixtures/grotte_barbu.xml'));
        $this->assertInstanceOf('PicoFeed\Rss20', $reader->getParser());
    }
}