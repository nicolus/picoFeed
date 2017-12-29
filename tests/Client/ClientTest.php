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
        $client = new Client();
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
        $client = new Client();
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
        $client = new Client();
        $client->setUrl('http://php.net/robots.txt');
        $client->execute();
        $etag = $client->getEtag();

        $client = new Client();
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
        $client = new Client();
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
        $client = new Client();
        $client->setUrl('http://php.net/');
        $client->execute();
        $this->assertEquals('utf-8', $client->getEncoding());

        $client = new Client();
        $client->setUrl('http://php.net/robots.txt');
        $client->execute();
        $this->assertEquals('', $client->getEncoding());
    }

    /**
     * @group online
     */
    public function testContentType()
    {
        $client = new Client();
        $client->setUrl('http://miniflux.net/assets/img/favicon.png');
        $client->execute();
        $this->assertEquals('image/png', $client->getContentType());

        $client = new Client();
        $client->setUrl('http://miniflux.net/');
        $client->execute();
        $this->assertEquals('text/html; charset=utf-8', $client->getContentType());
    }
}
