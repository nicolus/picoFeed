<?php

require_once 'lib/PicoFeed/Client.php';
require_once 'lib/PicoFeed/Clients/Stream.php';

use PicoFeed\Clients\Stream;

class StreamTest extends PHPUnit_Framework_TestCase
{
    public function testChunkedResponse()
    {
        $client = new Stream;
        $client->url = 'http://www.reddit.com/r/dwarffortress/.rss';
        $result = $client->doRequest();

        $this->assertNotFalse($result);
        $this->assertEquals('</rss>', substr($result['body'], -6));
    }

    public function testDownload()
    {
        $client = new Stream;
        $client->url = 'https://github.com/fguillot/picoFeed';
        $result = $client->doRequest();

        $this->assertNotFalse($result);
        $this->assertEquals(200, $result['status']);
        $this->assertEquals('text/html; charset=utf-8', $result['headers']['Content-Type']);
        $this->assertEquals('<!DOCTYPE html>', substr(trim($result['body']), 0, 15));
        $this->assertEquals('</html>', substr(trim($result['body']), -7));
    }

    public function testRedirect()
    {
        $client = new Stream;
        $client->url = 'http://github.com/fguillot/picoFeed';
        $result = $client->doRequest();

        $this->assertNotFalse($result);
        $this->assertEquals(200, $result['status']);
        $this->assertEquals('<!DOCTYPE html>', substr(trim($result['body']), 0, 15));
        $this->assertEquals('text/html; charset=utf-8', $result['headers']['Content-Type']);
    }
/*
    public function testInfiniteRedirect()
    {
        $client = new Stream;
        $client->url = 'http://www.accupass.com/home/rss/%E8%AA%B2%E7%A8%8B%E8%AC%9B%E5%BA%A7';
        $result = $client->doRequest();

        $this->assertFalse($result);
    }
*/
    public function testBadUrl()
    {
        $client = new Stream;
        $client->url = 'http://12345gfgfgf';
        $result = $client->doRequest();

        $this->assertFalse($result);
    }

    /*public function testAbortOnLargeBody()
    {
        $client = new Stream;
        $client->url = 'http://duga.jp/ror.xml';
        $result = $client->doRequest();

        $this->assertFalse($result);
    }*/

    public function testDecodeGzip()
    {
        $client = new Stream;
        $client->url = 'http://www.nasa.gov/rss/dyn/NASAcast_vodcast.rss';
        $result = $client->doRequest();

        $this->assertNotFalse($result);
        $this->assertEquals('gzip', $result['headers']['Content-Encoding']);
        $this->assertEquals('<?xml', substr(trim($result['body']), 0, 5));
    }
}