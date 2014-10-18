<?php

require_once 'lib/PicoFeed/PicoFeed.php';

use PicoFeed\Url;

class UrlTest extends PHPUnit_Framework_TestCase
{
    public function testHasScheme()
    {
        $url = new Url('http://www.google.fr/');
        $this->assertTrue($url->hasScheme());

        $url = new Url('//www.google.fr/');
        $this->assertFalse($url->hasScheme());

        $url = new Url('/path');
        $this->assertFalse($url->hasScheme());

        $url = new Url('anything');
        $this->assertFalse($url->hasScheme());
    }

    public function testHasPort()
    {
        $url = new Url('http://127.0.0.1:8000/');
        $this->assertTrue($url->hasPort());

        $url = new Url('http://127.0.0.1/');
        $this->assertFalse($url->hasPort());
    }

    public function testIsProtocolRelative()
    {
        $url = new Url('http://www.google.fr/');
        $this->assertFalse($url->isProtocolRelative());

        $url = new Url('//www.google.fr/');
        $this->assertTrue($url->isProtocolRelative());

        $url = new Url('/path');
        $this->assertFalse($url->isProtocolRelative());

        $url = new Url('anything');
        $this->assertFalse($url->isProtocolRelative());
    }

    public function testBaseUrl()
    {
        $url = new Url('../bla');
        $this->assertEquals('', $url->getBaseUrl());

        $url = new Url('github.com');
        $this->assertEquals('', $url->getBaseUrl());

        $url = new Url('http://127.0.0.1:8000');
        $this->assertEquals('http://127.0.0.1:8000', $url->getBaseUrl());

        $url = new Url('http://127.0.0.1:8000/test?123');
        $this->assertEquals('http://127.0.0.1:8000', $url->getBaseUrl());

        $url = new Url('http://localhost/test');
        $this->assertEquals('http://localhost', $url->getBaseUrl());

        $url = new Url('https://localhost/test');
        $this->assertEquals('https://localhost', $url->getBaseUrl());

        $url = new Url('//localhost/test?truc');
        $this->assertEquals('http://localhost', $url->getBaseUrl());
    }

    public function testIsRelativeUrl()
    {
        $url = new Url('http://www.google.fr/');
        $this->assertFalse($url->isRelativeUrl());

        $url = new Url('//www.google.fr/');
        $this->assertFalse($url->isRelativeUrl());

        $url = new Url('/path');
        $this->assertTrue($url->isRelativeUrl());

        $url = new Url('../../path');
        $this->assertTrue($url->isRelativeUrl());

        $url = new Url('anything');
        $this->assertTrue($url->isRelativeUrl());

        $url = new Url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUA
AAAFCAYAAACNbyblAAAAHElEQVQI12P4//8/w38GIAXDIBKE0DHxgljNBAAO
9TXL0Y4OHwAAAABJRU5ErkJggg==');
        $this->assertFalse($url->isRelativeUrl());
    }

    public function testGetFullPath()
    {
        $url = new Url('http://www.google.fr/');
        $this->assertEquals('/', $url->getFullPath());

        $url = new Url('//www.google.fr/search');
        $this->assertEquals('/search', $url->getFullPath());

        $url = new Url('/path');
        $this->assertEquals('/path', $url->getFullPath());

        $url = new Url('/path#test');
        $this->assertEquals('/path#test', $url->getFullPath());

        $url = new Url('anything');
        $this->assertEquals('/anything', $url->getFullPath());

        $url = new Url('index.php?foo=bar&test=1');
        $this->assertEquals('/index.php?foo=bar&test=1', $url->getFullPath());
    }

    public function testAbsoluteUrl()
    {
        $url = new Url('../bla');
        $this->assertEquals('', $url->getAbsoluteUrl(''));

        $url = new Url('http://www.google.fr/../bla');
        $this->assertEquals('http://www.google.fr/../bla', $url->getAbsoluteUrl('http://www.google.fr/'));

        $url = new Url('http://www.google.fr/');
        $this->assertEquals('http://www.google.fr/', $url->getAbsoluteUrl('http://www.google.fr/'));

        $url = new Url('//www.google.fr/search');
        $this->assertEquals('http://www.google.fr/search', $url->getAbsoluteUrl('//www.google.fr/'));

        $url = new Url('//www.google.fr/search');
        $this->assertEquals('http://www.google.fr/search', $url->getAbsoluteUrl());

        $url = new Url('/path');
        $this->assertEquals('http://www.google.fr/path', $url->getAbsoluteUrl('http://www.google.fr/'));

        $url = new Url('/path#test');
        $this->assertEquals('http://www.google.fr/path#test', $url->getAbsoluteUrl('http://www.google.fr/'));

        $url = new Url('anything');
        $this->assertEquals('http://www.google.fr/anything', $url->getAbsoluteUrl('http://www.google.fr/'));

        $url = new Url('index.php?foo=bar&test=1');
        $this->assertEquals('http://www.google.fr/index.php?foo=bar&test=1', $url->getAbsoluteUrl('http://www.google.fr/'));

        $url = new Url('index.php?foo=bar&test=1');
        $this->assertEquals('', $url->getAbsoluteUrl());

        $url = new Url('https://127.0.0.1:8000/here/test?v=3');
        $this->assertEquals('https://127.0.0.1:8000/here/test?v=3', $url->getAbsoluteUrl());

        $url = new Url('test?v=3');
        $this->assertEquals('https://127.0.0.1:8000/here/test?v=3', $url->getAbsoluteUrl('https://127.0.0.1:8000/here/'));
    }
}
