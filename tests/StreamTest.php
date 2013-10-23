<?php

require_once 'lib/PicoFeed/Client.php';
require_once 'lib/PicoFeed/Clients/Stream.php';

use PicoFeed\Clients\Stream;

class StreamTest extends PHPUnit_Framework_TestCase
{
    public function testDownload()
    {
        $client = new Stream;
        $client->url = 'http://petitcodeur.fr/robots.txt';
        $result = $client->doRequest();

        $this->assertTrue(is_array($result));
        $this->assertEquals(200, $result['status']);
        $this->assertEquals('Sitemap: http://petitcodeur.fr/sitemap.xml', $result['body']);
        $this->assertEquals('text/plain; charset=utf-8', $result['headers']['Content-Type']);
    }


    public function testRedirect()
    {
        $client = new Stream;
        $client->url = 'http://www.miniflux.net/index.html';
        $result = $client->doRequest();

        $this->assertTrue(is_array($result));
        $this->assertEquals(200, $result['status']);
        $this->assertEquals('<!DOCTYPE', substr($result['body'], 0, 9));
        $this->assertEquals('text/html; charset=utf-8', $result['headers']['Content-Type']);
    }


    // public function testInfiniteRedirect()
    // {
    //     $client = new Stream;
    //     $client->url = 'http://www.accupass.com/home/rss/%E8%AA%B2%E7%A8%8B%E8%AC%9B%E5%BA%A7';
    //     $result = $client->doRequest();

    //     $this->assertFalse($result);
    // }


    public function testBadUrl()
    {
        $client = new Stream;
        $client->url = 'http://12345gfgfgf';
        $result = $client->doRequest();

        $this->assertFalse($result);
    }


    public function testAbortOnLargeBody()
    {
        $client = new Stream;
        $client->url = 'http://duga.jp/ror.xml';
        $result = $client->doRequest();

        $this->assertFalse($result);
    }
}