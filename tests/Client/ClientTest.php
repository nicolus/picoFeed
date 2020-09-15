<?php

namespace PicoFeed\Client;

use BlastCloud\Guzzler\UsesGuzzler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

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
        $this->guzzler->queueMany(new Response(200, [
            'content-Type'  => 'text/plain',
            'etag'          => '336-50d275e263080',
            'last-modified' => 'Mon, 15 Apr 2019 09:31:45 GMT',
        ], 'someContent'), 2);

        $this->client->execute();
        $etag = $this->client->getEtag();

        $client = new Client($this->guzzler->getClient());
        $client->setEtag($etag);
        $client->execute();

        $this->assertTrue($this->client->isModified());
    }

    public function testGetExpirationDate()
    {
        $response = new Response(200, [
            'content-Type'  => 'text/plain',
            'Expires'       => 'Wed, 21 Oct 2015 07:28:00 GMT',
        ], 'someContent');

        $this->guzzler->queueResponse($response);
        $this->client->execute();

        $this->assertInstanceOf(\DateTime::class, $this->client->getExpiration());
        $this->assertTrue($this->client->isModified());
    }

    public function testGetExpirationDateFromMaxAge()
    {
        $this->guzzler->queueResponse(
            new Response(200, [
                'content-Type'  => 'text/plain',
                'Cache-control' => 'max-age=3600', //expires in an hours
            ], 'someContent'),
            new Response(200, [
                'content-Type'  => 'text/plain',
                'Cache-control' => 's-maxage=7200', //expires in an hours
            ], 'someContent')
        );

        $this->client->execute();

        $this->assertInstanceOf(\DateTime::class, $this->client->getExpiration());
        $this->assertEquals(time() + 3600, $this->client->getExpiration()->getTimestamp(), '', 2);

        $this->client->execute();
        $this->assertInstanceOf(\DateTime::class, $this->client->getExpiration());
        $this->assertEquals(time() + 7200, $this->client->getExpiration()->getTimestamp(), '', 2);
    }


    public function testCacheEtag()
    {
        $this->guzzler->queueMany(new Response(200, [
            'content-Type' => 'text/plain',
            'etag'         => '336-50d275e263080',
        ], 'someContent'), 2);

        $this->client->execute();
        $etag = $this->client->getEtag();
        $lastModified = $this->client->getLastModified();

        $this->client->setEtag($etag);
        $this->client->setLastModified($lastModified);
        $this->client->execute();

        $this->assertFalse($this->client->isModified());
    }


    public function testCacheHeadersAreSet()
    {
        $this->guzzler->queueResponse(new Response(200, [
            'content-Type'  => 'text/plain'
        ], 'someContent'));

        $this->client->execute();
        $this->assertIsString($this->client->getEtag());
        $this->assertEmpty($this->client->getEtag());
        $this->assertIsString($this->client->getLastModified());
        $this->assertEmpty($this->client->getLastModified());

        $this->guzzler->queueResponse(new Response(200, [
            'content-Type'  => 'text/plain',
            'etag'          => '336-50d275e263080',
            'last-modified' => 'Mon, 15 Apr 2019 09:31:45 GMT',
        ], 'someContent'));

        $this->client->execute();
        $this->assertEquals('336-50d275e263080', $this->client->getEtag());
        $this->assertEquals('Mon, 15 Apr 2019 09:31:45 GMT', $this->client->getLastModified());
    }

    public function testCacheLastModified()
    {
        $this->guzzler->queueMany(new Response(200, [
            'content-Type'  => 'text/plain',
            'last-modified' => 'Mon, 15 Apr 2019 09:31:45 GMT',
        ], 'someContent'), 2);


        $this->client->execute();
        $lastmod = $this->client->getLastModified();

        $this->client->setLastModified($lastmod);
        $this->client->execute();

        $this->assertFalse($this->client->isModified());
    }


    public function testCacheBoth()
    {
        $this->guzzler->queueMany(new Response(200, [
            'content-Type'  => 'text/plain',
            'etag'          => '336-50d275e263080',
            'last-modified' => 'Mon, 15 Apr 2019 09:31:45 GMT',
        ], 'someContent'), 2);

        $this->client->execute();
        $lastmod = $this->client->getLastModified();
        $etag = $this->client->getEtag();

        $this->client->setLastModified($lastmod);
        $this->client->setEtag($etag);
        $this->client->execute();

        $this->assertFalse($this->client->isModified());
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
        $this->guzzler->queueResponse(new Response(200, [
            'content-Type' => 'text/html; charset=utf-8',
        ], 'someContent'), new Response(200, [
            'content-Type' => 'text/plain',
        ], 'someContent'));


        $this->client->setUrl('http://php.net/');
        $this->client->execute();
        $this->assertEquals('utf-8', $this->client->getEncoding());

        $this->client->setUrl('http://php.net/robots.txt');
        $this->client->execute();
        $this->assertEquals('', $this->client->getEncoding());
    }


    public function testContentType()
    {
        $this->guzzler->queueResponse(
            new Response(200, [
                'content-Type' => 'image/png',
            ], 'someContent'),
            new Response(200, [
                'content-Type' => 'text/html; charset=utf-8',
            ], 'someContent')
        );

        $this->client->execute();
        $this->assertEquals('image/png', $this->client->getContentType());

        $this->client->execute();
        $this->assertEquals('text/html; charset=utf-8', $this->client->getContentType());
    }
}
