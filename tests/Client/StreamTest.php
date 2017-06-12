<?php

namespace PicoFeed\Client;

use PHPUnit_Framework_TestCase;

class StreamTest extends PHPUnit_Framework_TestCase
{
    /**
     * @group online
     */
    public function testChunkedResponse()
    {
        $client = new Stream();
        $client->setUrl('http://www.reddit.com/r/dwarffortress/.rss');
        $result = $client->doRequest();

        $this->assertEquals('</feed>', substr($result['body'], -7));
    }

    /**
     * @group online
     */
    public function testDownload()
    {
        $client = new Stream();
        $client->setUrl('https://github.com/miniflux/picoFeed');
        $result = $client->doRequest();

        $this->assertEquals(200, $result['status']);
        $this->assertEquals('text/html; charset=utf-8', $result['headers']['Content-Type']);
        $this->assertEquals('<!DOCTYPE html>', substr(trim($result['body']), 0, 15));
        $this->assertEquals('</html>', substr(trim($result['body']), -7));
    }

    /**
     * @runInSeparateProcess
     * @group online
     */
    public function testPassthrough()
    {
        $client = new Stream();
        $client->setUrl('http://miniflux.net/favicon.ico');
        $client->enablePassthroughMode();
        $client->doRequest();

        $this->expectOutputString(file_get_contents('tests/fixtures/miniflux_favicon.ico'));
    }

    /**
     * @expectedException \PicoFeed\Client\InvalidUrlException
     */
    public function testBadUrl()
    {
        $client = new Stream();
        $client->setUrl('http://12345gfgfgf');
        $client->setTimeout(1);
        $client->doRequest();
    }

    /**
     * @group online
     */
    public function testDecodeGzip()
    {
        if (function_exists('gzdecode')) {
            $client = new Stream();
            $client->setUrl('https://github.com/miniflux/picoFeed');
            $result = $client->doRequest();

            $this->assertEquals('gzip', $result['headers']['Content-Encoding']);
            $this->assertEquals('<!DOC', substr(trim($result['body']), 0, 5));
        }
    }
}
