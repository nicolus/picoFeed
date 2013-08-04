<?php

require_once 'lib/PicoFeed/Reader.php';
require_once 'lib/PicoFeed/Filter.php';

use PicoFeed\Filter;
use PicoFeed\Reader;

class FilterTest extends PHPUnit_Framework_TestCase
{
    public function testCode()
    {
        $data = '<pre><code>HEAD / HTTP/1.1
Accept: text/html
Accept-Encoding: gzip, deflate, compress
Host: www.amazon.com
User-Agent: HTTPie/0.6.0



<strong>HTTP/1.1 405 MethodNotAllowed</strong>
Content-Encoding: gzip
Content-Type: text/html; charset=ISO-8859-1
Date: Mon, 15 Jul 2013 02:05:59 GMT
Server: Server
Set-Cookie: skin=noskin; path=/; domain=.amazon.com; expires=Mon, 15-Jul-2013 02:05:59 GMT
Vary: Accept-Encoding,User-Agent
<strong>allow: POST, GET</strong>
x-amz-id-1: 11WD3K15FC268R5GBJY5
x-amz-id-2: DDjqfqz2ZJufzqRAcj1mh+9XvSogrPohKHwXlo8IlkzH67G6w4wnjn9HYgbs4uI0
</code></pre>';

        $f = new Filter($data, 'http://blabla');
        $this->assertEquals($data, $f->execute());
    }


    public function testRemoveEmptyTags()
    {
        $data = '<p>toto</p><p></p><br/>';
        $f = new Filter($data, 'http://blabla');
        $this->assertEquals('<p>toto</p><br/>', $f->removeEmptyTags($data));

        $data = '<p> </p>';
        $f = new Filter($data, 'http://blabla');
        $this->assertEquals('', $f->execute());

        $data = '<p>&nbsp;</p>';
        $f = new Filter($data, 'http://blabla');
        $this->assertEquals('', $f->execute());
    }


    public function testRemoveEmptyTable()
    {
        $data = '<table><tr><td>    </td></tr></table>';

        $f = new Filter($data, 'http://blabla');
        $this->assertEquals('', $f->execute());

        $data = '<table><tr></tr></table>';

        $f = new Filter($data, 'http://blabla');
        $this->assertEquals('', $f->execute());
    }


    public function testRemoveNoBreakingSpace()
    {
        $data = '<p>&nbsp;&nbsp;truc</p>';

        $f = new Filter($data, 'http://blabla');
        $this->assertEquals('<p> truc</p>', $f->execute());
    }


    public function testBadAttributes()
    {
        $data = '<iframe src="http://www.youtube.com/bla" height="480px" width="100%" frameborder="0"></iframe>';

        $f = new Filter($data, 'http://blabla');
        $this->assertEquals('<iframe src="http://www.youtube.com/bla" frameborder="0"></iframe>', $f->execute());
    }


    public function testGetAbsoluteUrl()
    {
        $f = new Filter('', '');

        $this->assertEquals('http://google.com/', $f->getAbsoluteUrl('/', 'http://google.com'));
        $this->assertEquals('https://google.com/boo', $f->getAbsoluteUrl('boo', 'https://google.com'));
        $this->assertEquals('http://google.com/', $f->getAbsoluteUrl('/', 'google.com'));
        $this->assertEquals('http://google.com/bla', $f->getAbsoluteUrl('bla', 'google.com'));
        $this->assertEquals('http://google.com/../bla', $f->getAbsoluteUrl('../bla', 'google.com'));
        $this->assertEquals('', $f->getAbsoluteUrl('../bla', ''));
    }


    public function testIsRelativePath()
    {
        $f = new Filter('<a href="/bla/bla">link</a>', 'http://blabla');
        $this->assertTrue($f->isRelativePath('/bbla'));
        $this->assertTrue($f->isRelativePath('../../bbla'));
        $this->assertFalse($f->isRelativePath('http://google.fr'));
        $this->assertFalse($f->isRelativePath('//superurl'));
        $this->assertFalse($f->isRelativePath('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUA
AAAFCAYAAACNbyblAAAAHElEQVQI12P4//8/w38GIAXDIBKE0DHxgljNBAAO
9TXL0Y4OHwAAAABJRU5ErkJggg=='));
    }


    public function testEmptyTags()
    {
        $data = <<<EOD
<div>
<a href="file://path/to/a/file">
    <img src="http://example.com/image.png" />
</a>
</div>
EOD;
        $f = new Filter($data, 'http://blabla');
        $output = $f->execute();

        $this->assertEquals('<img src="http://example.com/image.png"/>', trim($output));
    }


    public function testIframe()
    {
        $data = '<iframe src="http://www.kickstarter.com/projects/lefnire/habitrpg-mobile/widget/video.html" height="480" width="640" frameborder="0"></iframe>';

        $f = new Filter($data, 'http://blabla');
        $this->assertEmpty($f->execute());

        $data = '<iframe src="http://www.youtube.com/bla" height="480" width="640" frameborder="0"></iframe>';

        $f = new Filter($data, 'http://blabla');
        $this->assertEquals($data, $f->execute());
    }


    public function testOverrideFilters()
    {
        // Add a new whitelist
        Filter::$iframe_whitelist[] = 'http://www.kickstarter.com';

        $data = '<iframe src="http://www.kickstarter.com/projects/lefnire/habitrpg-mobile/widget/video.html" height="480" width="640" frameborder="0"></iframe>';

        $f = new Filter($data, 'http://blabla');
        $this->assertEquals($data, $f->execute());

        // Reset the entire array
        Filter::$iframe_whitelist = array('http://www.kickstarter.com');

        $data = '<iframe src="http://www.kickstarter.com/projects/lefnire/habitrpg-mobile/widget/video.html" height="480" width="640" frameborder="0"></iframe>';

        $f = new Filter($data, 'http://blabla');
        $this->assertEquals($data, $f->execute());

        $data = '<iframe src="http://www.youtube.com/bla" height="480" width="640" frameborder="0"></iframe>';

        $f = new Filter($data, 'http://blabla');
        $this->assertEmpty($f->execute());
    }
}