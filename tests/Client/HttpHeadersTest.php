<?php

namespace PicoFeed\Client;

use PHPUnit_Framework_TestCase;

class HttpHeadersTest extends PHPUnit_Framework_TestCase
{
    public function testHttpHeadersSet()
    {
        $headers = new HttpHeaders(array('Content-Type' => 'test'));
        $this->assertEquals('test', $headers['content-typE']);
        $this->assertTrue(isset($headers['ConTent-Type']));

        unset($headers['Content-Type']);
        $this->assertFalse(isset($headers['ConTent-Type']));
    }

    public function testParseWithMultipleOccurrenceOfHTTP()
    {
        $lines = array(
            "HTTP/1.1 200 OK\r\n",
            "Server: cloudflare-nginx\r\n",
            "Date: Sun, 18 Oct 2015 20:48:32 GMT\r\n",
            "Content-Type: application/rss+xml; charset=windows-1252\r\n",
            "Transfer-Encoding: chunked\r\n",
            "Connection: close\r\n",
            "Set-Cookie: __cfduid=d336d436cbf03ba876dee1ed03f24c8ac1445201311; expires=Mon, 17-Oct-16 20:48:31 GMT; path=/; domain=.elance.com; HttpOnly\r\n",
            "X-Frame-Options: SAMEORIGIN\r\n",
            "Set-Cookie: sess=a6tuu95d1m879hpb11hre6p5o3; path=/; domain=elance.com; secure; HttpOnly\r\n",
            "Cache-Control: private, must-revalidate\r\n",
            "pragma: no-cache\r\n",
            "expires: -1\r\n",
            "Front-End-Https: on\r\n",
            "HTTPS: on\r\n",
            "CF-RAY: 23771ac66c382210-EWR\r\n",
            "\r\n",
        );

        list($status, $headers) = HttpHeaders::parse($lines);
        $this->assertEquals(200, $status);
        $this->assertArrayHasKey('Server', $headers);
        $this->assertArrayHasKey('HTTPS', $headers);
        $this->assertEquals('cloudflare-nginx', $headers['server']);
    }

    public function testParseWithMultipleRedirections()
    {
        $headers = array(
            "HTTP/1.1 301 OK\r\n",
            "Content-Length: 0\r\n",
            "Date: Sun, 18 Oct 2015 21:18:32 GMT\r\n",
            "Server: FeedsPortal\r\n",
            "Set-Cookie: MF2=a3iv4l8f35k8; domain=.feedsportal.com; expires=Tue, 17-Oct-17 21:18:32 GMT; path=/\r\n",
            "Location: http://da.feedsportal.com/c/629/f/502199/s/42e50391/sc/3/l/0L0S0A1net0N0Ceditorial0C6437220Candroid0Egoogle0Enow0Es0Eouvre0Eaux0Eapplications0Etierces0C0T0Dxtor0FRSS0E16/ia1.htm\r\n",
            "Connection: close\r\n",
            "HTTP/1.1 301 OK\r\n",
            "Server: FeedsPortal\r\n",
            "Location: http://www.01net.com/editorial/643722/android-google-now-s-ouvre-aux-applications-tierces/#?xtor=RSS-16\r\n",
            "Content-Type: text/plain; charset=iso-8859-1\r\n",
            "Content-Length: 0\r\n",
            "Date: Sun, 18 Oct 2015 21:18:32 GMT\r\n",
            "Connection: close\r\n",
            "HTTP/1.1 301 Moved Permanently\r\n",
            "Server: nginx\r\n",
            "Date: Sun, 18 Oct 2015 21:18:33 GMT\r\n",
            "Content-Type: text/html\r\n",
            "Connection: close\r\n",
            "Location: http://www.01net.com/actualites/android-google-now-s-ouvre-aux-applications-tierces-643722.html\r\n",
            "HTTP/1.1 200 OK\r\n",
            "Server: nginx\r\n",
            "Content-Type: text/html; charset=utf-8\r\n",
            "Connection: close\r\n",
            "Vary: Accept-Encoding\r\n",
            "Date: Sun, 18 Oct 2015 21:18:33 GMT\r\n",
            "Content-Encoding: gzip\r\n",
        );

        list($status) = HttpHeaders::parse($headers);
        $this->assertEquals(200, $status);
    }

    public function testParseWithEmptyHeaderValue()
    {
        $headers = array(
            "HTTP/1.1 301 OK\r\n",
            "Pragma:",
        );

        list($status) = HttpHeaders::parse($headers);
        $this->assertEquals(301, $status);
    }
}
