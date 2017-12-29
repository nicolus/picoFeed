<?php

namespace PicoFeed\Client;

use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    /**
     * @group online
     */
    public function testDownload()
    {
        $client = Client::getInstance();
        $client->setUrl('http://php.net/robots.txt');
        $client->execute();

        $this->assertTrue($client->isModified());
        $this->assertNotEmpty($client->getContent());
    }

    /**
     * @runInSeparateProcess
     * @group online
     */
    public function testPassthrough()
    {
        $client = new Client(new \GuzzleHttp\Client());
        $client->setUrl('https://miniflux.net/favicon.ico');
        $client->enablePassthroughMode();
        $client->execute();

        $this->expectOutputString(file_get_contents('tests/fixtures/miniflux_favicon.ico'));
    }

    /**
     * @group online
     */
    public function testCacheBothHaveToMatch()
    {
        $client = Client::getInstance();
        $client->setUrl('http://php.net/robots.txt');
        $client->execute();
        $etag = $client->getEtag();

        $client = Client::getInstance();
        $client->setUrl('http://php.net/robots.txt');
        $client->setEtag($etag);
        $client->execute();

        $this->assertTrue($client->isModified());
    }

    /**
     * @group online
     */
    public function testMultipleDownload()
    {
        $client = Client::getInstance();
        $client->setUrl('http://miniflux.net/');
        $result = $client->doRequest();

        $body = $result->getBody()->getContents();
        $result = $client->doRequest();

        $this->assertEquals($body, $result->getBody()->getContents());
    }

    /**
     * @group online
     */
    public function testCharset()
    {
        $client = Client::getInstance();
        $client->setUrl('http://php.net/');
        $client->execute();
        $this->assertEquals('utf-8', $client->getEncoding());

        $client = Client::getInstance();
        $client->setUrl('http://php.net/robots.txt');
        $client->execute();
        $this->assertEquals('', $client->getEncoding());
    }

    /**
     * @group online
     */
    public function testContentType()
    {
        $client = Client::getInstance();
        $client->setUrl('http://miniflux.net/assets/img/favicon.png');
        $client->execute();
        $this->assertEquals('image/png', $client->getContentType());

        $client = Client::getInstance();
        $client->setUrl('http://miniflux.net/');
        $client->execute();
        $this->assertEquals('text/html; charset=utf-8', $client->getContentType());
    }
}
