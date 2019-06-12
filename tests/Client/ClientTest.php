<?php

namespace PicoFeed\Client;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use BlastCloud\Guzzler\UsesGuzzler;

class ClientTest extends TestCase
{

    use UsesGuzzler;


    /**
     * @var Client
     */
    protected $client;

    public function setUp(): void
    {
        parent::setUp();

        $this->client = new Client($this->guzzler->getClient());
    }

    public function testFactoryWorks()
    {
        // Testing that the factory is not completely broken,
        // we won't use it for the rest of the tests since we'll need to use custom mock hanlders.
        $client = Client::getInstance();
        $this->assertInstanceOf(Client::class, $client);
    }


    public function testDownload()
    {
        $this->guzzler->queueResponse(
            new Response(200, ['content-Type' => 'application/rss+xml'], 'someResponse')
        );

        $this->client->execute();

        $this->assertTrue($this->client->isModified());
        $this->assertNotEmpty($this->client->getContent());
    }


    public function testPassthrough()
    {
        $fileContent = file_get_contents(__DIR__ . '/../fixtures/miniflux_favicon.ico');

        $this->guzzler->queueResponse(
            new Response(200, ['content-Type' => 'image/x-icon'], $fileContent)
        );

        $this->client->enablePassthroughMode();
        $this->client->execute();

        $this->expectOutputString($fileContent);
    }

    public function testCacheBothDateAndEtagHaveToMatchIfPresent()
    {
        $response = new Response(200, [
            'content-Type'  => 'text/plain',
            'etag'          => '336-50d275e263080',
            'last-modified' => 'Mon, 15 Apr 2019 09:31:45 GMT',
        ], 'someContent');

        $this->guzzler->queueResponse($response);

        $this->client->execute();
        $etag = $this->client->getEtag();


        $this->client->setEtag($etag);
        $this->client->execute();

        $this->assertTrue($this->client->isModified());
    }

    public function testGetExpirationDate()
    {
        $response = new Response(200, [
            'content-Type'  => 'text/plain',
            'Expires'       => 'Wed, 21 Oct 2015 07:28:00 GMT',
        ], 'someContent');
        $mock = new MockHandler([$response, $response]);
        $handler = HandlerStack::create($mock);


        $client = new Client(new \GuzzleHttp\Client(['handler' => $handler]));
        $client->setUrl('http://php.net/robots.txt');
        $client->execute();

        $this->assertInstanceOf(\DateTime::class, $client->getExpiration());
        $this->assertTrue($client->isModified());
    }

    public function testGetExpirationDateFromMaxAge()
    {
        $responseMaxAge = new Response(200, [
            'content-Type'  => 'text/plain',
            'Cache-control' => 'max-age=3600', //expires in an hours
        ], 'someContent');

        $responseSMaxAge = new Response(200, [
            'content-Type'  => 'text/plain',
            'Cache-control' => 's-maxage=7200', //expires in an hours
        ], 'someContent');

        $mock = new MockHandler([$responseMaxAge, $responseSMaxAge]);
        $handler = HandlerStack::create($mock);

        $client = new Client(new \GuzzleHttp\Client(['handler' => $handler]));
        $client->setUrl('http://php.net/robots.txt');
        $client->execute();

        $this->assertInstanceOf(\DateTime::class, $client->getExpiration());
        $this->assertEquals(time() + 3600, $client->getExpiration()->getTimestamp(), '', 2);

        $client->execute();
        $this->assertInstanceOf(\DateTime::class, $client->getExpiration());
        $this->assertEquals(time() + 7200, $client->getExpiration()->getTimestamp(), '', 2);
    }


    public function testCacheEtag()
    {
        $response = new Response(200, [
            'content-Type' => 'text/plain',
            'etag'         => '336-50d275e263080',
        ], 'someContent');
        $mock = new MockHandler([$response, $response]);
        $handler = HandlerStack::create($mock);

        $client = new Client(new \GuzzleHttp\Client(['handler' => $handler]));
        $client->setUrl('http://php.net/robots.txt');
        $client->execute();
        $etag = $client->getEtag();
        $lastModified = $client->getLastModified();

        $client = new Client(new \GuzzleHttp\Client(['handler' => $handler]));
        $client->setUrl('http://php.net/robots.txt');
        $client->setEtag($etag);
        $client->setLastModified($lastModified);
        $client->execute();

        $this->assertFalse($client->isModified());
    }


    public function testCacheLastModified()
    {
        $response = new Response(200, [
            'content-Type'  => 'text/plain',
            'last-modified' => 'Mon, 15 Apr 2019 09:31:45 GMT',
        ], 'someContent');
        $mock = new MockHandler([$response, $response]);
        $handler = HandlerStack::create($mock);

        $client = new Client(new \GuzzleHttp\Client(['handler' => $handler]));
        $client->setUrl('http://miniflux.net/robots.txt');
        $client->execute();
        $lastmod = $client->getLastModified();

        $client = new Client(new \GuzzleHttp\Client(['handler' => $handler]));
        $client->setUrl('http://miniflux.net/robots.txt');
        $client->setLastModified($lastmod);
        $client->execute();

        $this->assertFalse($client->isModified());
    }


    public function testCacheBoth()
    {
        $response = new Response(200, [
            'content-Type'  => 'text/plain',
            'etag'          => '336-50d275e263080',
            'last-modified' => 'Mon, 15 Apr 2019 09:31:45 GMT',
        ], 'someContent');
        $mock = new MockHandler([$response, $response]);
        $handler = HandlerStack::create($mock);

        $client = new Client(new \GuzzleHttp\Client(['handler' => $handler]));
        $client->setUrl('http://miniflux.net/robots.txt');
        $client->execute();
        $lastmod = $client->getLastModified();
        $etag = $client->getEtag();

        $client = new Client(new \GuzzleHttp\Client(['handler' => $handler]));
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


    public function testCharset()
    {
        $responseWithCharset = new Response(200, [
            'content-Type' => 'text/html; charset=utf-8',
        ], 'someContent');

        $responseWithoutCharset = new Response(200, [
            'content-Type' => 'text/plain',
        ], 'someContent');
        $mock = new MockHandler([$responseWithCharset, $responseWithoutCharset]);
        $handler = HandlerStack::create($mock);

        $client = new Client(new \GuzzleHttp\Client(['handler' => $handler]));


        $client->setUrl('http://php.net/');
        $client->execute();
        $this->assertEquals('utf-8', $client->getEncoding());

        $client->setUrl('http://php.net/robots.txt');
        $client->execute();
        $this->assertEquals('', $client->getEncoding());
    }


    public function testContentType()
    {
        $responseImage = new Response(200, [
            'content-Type' => 'image/png',
        ], 'someContent');

        $responseHtml = new Response(200, [
            'content-Type' => 'text/html; charset=utf-8',
        ], 'someContent');

        $mock = new MockHandler([$responseImage, $responseHtml]);
        $handler = HandlerStack::create($mock);

        $client = new Client(new \GuzzleHttp\Client(['handler' => $handler]));

        $client->setUrl('https://miniflux.app/image/favicon.png');
        $client->execute();
        $this->assertEquals('image/png', $client->getContentType());

        $client->setUrl('https://miniflux.app/');
        $client->execute();
        $this->assertEquals('text/html; charset=utf-8', $client->getContentType());
    }
}
