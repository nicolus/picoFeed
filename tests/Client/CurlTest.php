<?php

namespace PicoFeed\Client;

use PHPUnit_Framework_TestCase;

class CurlTest extends PHPUnit_Framework_TestCase
{
    /**
     * @group online
     */
    public function testDownload()
    {
        $client = new Curl();
        $client->setUrl('http://miniflux.net/');
        $result = $client->doRequest();

        $this->assertTrue(is_array($result));
        $this->assertEquals(200, $result['status']);
        $this->assertEquals('<!DOC', substr($result['body'], 0, 5));
        $this->assertEquals('text/html; charset=UTF-8', $result['headers']['Content-Type']);
    }

    /**
     * @runInSeparateProcess
     * @group online
     */
    public function testPassthrough()
    {
        $client = new Curl();
        $client->setUrl('https://miniflux.net/favicon.ico');
        $client->enablePassthroughMode();
        $client->doRequest();

        $this->expectOutputString(file_get_contents('tests/fixtures/miniflux_favicon.ico'));
    }

    /**
     * @expectedException \PicoFeed\Client\InvalidCertificateException
     * @group online
     */
    public function testSSL()
    {
        $client = new Curl();
        $client->setUrl('https://www.mjvmobile.com.br');
        $client->doRequest();
    }

    /**
     * @expectedException \PicoFeed\Client\InvalidUrlException
     */
    public function testBadUrl()
    {
        $client = new Curl();
        $client->setUrl('http://12345gfgfgf');
        $client->doRequest();
    }
}
