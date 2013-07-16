<?php

require_once 'lib/PicoFeed/Client.php';
require_once 'lib/PicoFeed/Clients/Curl.php';

use PicoFeed\Clients\Curl;

class CurlTest extends PHPUnit_Framework_TestCase
{
    public function testDownload()
    {
        $client = new Curl;
        $client->url = 'http://petitcodeur.fr/robots.txt';
        $result = $client->doRequest();

        $this->assertTrue(is_array($result));
        $this->assertEquals(200, $result['status']);
        $this->assertEquals('Sitemap: http://petitcodeur.fr/sitemap.xml', $result['body']);
        $this->assertEquals('text/plain', $result['headers']['Content-Type']);
    }


    public function testRedirect()
    {
        $client = new Curl;
        $client->url = 'http://www.miniflux.net/index.html';
        $result = $client->doRequest();

        $this->assertTrue(is_array($result));
        $this->assertEquals(200, $result['status']);
        $this->assertEquals('<!DOCTYPE', substr($result['body'], 0, 9));
        $this->assertEquals('text/html; charset=utf-8', $result['headers']['Content-Type']);
    }
}