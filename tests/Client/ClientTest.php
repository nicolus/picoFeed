<?php

namespace PicoFeed\Client;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{


    public function testFactoryWorks()
    {
        // Testing that the factory is not completely broken,
        // we won't use it for the rest of the tests since we'll need to use custom mock hanlders.
        $client = Client::getInstance();
        $this->assertInstanceOf(Client::class, $client);
    }


    public function testDownload()
    {

        $mock = new MockHandler([
            new Response(200, ['content-Type' => 'application/rss+xml'], 'someResponse'),
        ]);
        $handler = HandlerStack::create($mock);

        $client = new Client(new \GuzzleHttp\Client(['handler' => $handler]));

        $client->setUrl('http://php.net/robots.txt');
        $client->execute();

        $this->assertTrue($client->isModified());
        $this->assertNotEmpty($client->getContent());
    }


    public function testPassthrough()
    {
        $fileContent = file_get_contents(__DIR__ . '/../fixtures/miniflux_favicon.ico');

        $mock = new MockHandler([
            new Response(200, ['content-Type' => 'image/x-icon'], $fileContent),
        ]);
        $handler = HandlerStack::create($mock);

        $client = new Client(new \GuzzleHttp\Client(['handler' => $handler]));

        $client->setUrl('https://miniflux.net/favicon.ico');
        $client->enablePassthroughMode();
        $client->execute();

        $this->expectOutputString($fileContent);
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
    public function testCacheEtag()
    {
        $client = Client::getInstance();
        $client->setUrl('http://php.net/robots.txt');
        $client->execute();
        $etag = $client->getEtag();
        $lastModified = $client->getLastModified();

        die('last modified : ' . $lastModified);
        die("etag : " . $etag);

        $client = Client::getInstance();
        $client->setUrl('http://php.net/robots.txt');
        $client->setEtag($etag);
        $client->setLastModified($lastModified);
        $client->execute();

        $this->assertFalse($client->isModified());
    }

    /**
     * @group online
     */
    public function testCacheLastModified()
    {
        $client = Client::getInstance();
        $client->setUrl('http://miniflux.net/robots.txt');
        $client->execute();
        $lastmod = $client->getLastModified();

        $client = Client::getInstance();
        $client->setUrl('http://miniflux.net/robots.txt');
        $client->setLastModified($lastmod);
        $client->execute();

        $this->assertFalse($client->isModified());
    }

    /**
     * @group online
     */
    public function testCacheBoth()
    {
        $client = Client::getInstance();
        $client->setUrl('http://miniflux.net/robots.txt');
        $client->execute();
        $lastmod = $client->getLastModified();
        $etag = $client->getEtag();

        $client = Client::getInstance();
        $client->setUrl('http://miniflux.net/robots.txt');
        $client->setLastModified($lastmod);
        $client->setEtag($etag);
        $client->execute();

        $this->assertFalse($client->isModified());
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
        $client->setUrl('https://miniflux.app/image/favicon.png');
        $client->execute();
        $this->assertEquals('image/png', $client->getContentType());

        $client = Client::getInstance();
        $client->setUrl('https://miniflux.app/');
        $client->execute();
        $this->assertEquals('text/html; charset=utf-8', $client->getContentType());
    }
}
