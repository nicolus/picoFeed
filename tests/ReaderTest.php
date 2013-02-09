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


    public function testDetectFormat()
    {
        $reader = new Reader(file_get_contents('tests/fixtures/rss2sample.xml'));
        $this->assertInstanceOf('PicoFeed\Rss20', $reader->getParser());

        $reader = new Reader(file_get_contents('tests/fixtures/atomsample.xml'));
        $this->assertInstanceOf('PicoFeed\Atom', $reader->getParser());

        $reader = new Reader;
        $this->assertFalse($reader->getParser());
    }
}