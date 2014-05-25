<?php

require_once 'lib/PicoFeed/PicoFeed.php';

use PicoFeed\Filter;
use PicoFeed\Reader;

class FilterTest extends PHPUnit_Framework_TestCase
{
    public function testStripHeadTag()
    {
        $input = '<html><head><title>test</title></head><body><h1>boo</h1></body>';
        $expected = '<html><body><h1>boo</h1></body>';
        $this->assertEquals($expected, Filter::stripHeadTags($input));

        $input = file_get_contents('tests/fixtures/html_page.html');
        $expected = file_get_contents('tests/fixtures/html_head_stripped_page.html');
        $this->assertEquals($expected, Filter::stripHeadTags($input));
    }


    public function testAttributes()
    {
        $f = new Filter('<img src="foo" title="\'quote" alt="\'quote" data-src="bar" data-truc="boo"/>', 'http://blabla');
        $this->assertEquals('<img src="http://blabla/foo" title="&#039;quote" alt="&#039;quote"/>', $f->execute());

        $f = new Filter('<img src="foo&bar=\'quote"/>', 'http://blabla');
        $this->assertEquals('<img src="http://blabla/foo&amp;bar=&#039;quote"/>', $f->execute());

        $f = new Filter("<time datetime='quote\"here'>bla</time>", 'http://blabla');
        $this->assertEquals('<time datetime="quote&quot;here">bla</time>', $f->execute());
    }


    public function testStripXmlTag()
    {
        $data = file_get_contents('tests/fixtures/jeux-linux.fr.xml');
        $this->assertEquals('<rss', substr(Filter::stripXmlTag($data), 0, 4));

        $data = file_get_contents('tests/fixtures/ezrss.it');
        $this->assertEquals('<!DOC', substr(Filter::stripXmlTag($data), 0, 5));

        $data = file_get_contents('tests/fixtures/fulltextrss.xml');
        $this->assertEquals('<rss', substr(Filter::stripXmlTag($data), 0, 4));

        $data = file_get_contents('tests/fixtures/sametmax.xml');
        $this->assertEquals('<rss', substr(Filter::stripXmlTag($data), 0, 4));

        $data = file_get_contents('tests/fixtures/grotte_barbu.xml');
        $this->assertEquals('<rss', substr(Filter::stripXmlTag($data), 0, 4));

        $data = file_get_contents('tests/fixtures/ibash.ru.xml');
        $this->assertEquals('<rss', substr(Filter::stripXmlTag($data), 0, 4));

        $data = file_get_contents('tests/fixtures/pcinpact.xml');
        $this->assertEquals('<rss', substr(Filter::stripXmlTag($data), 0, 4));

        $data = file_get_contents('tests/fixtures/resorts.xml');
        $this->assertEquals('<rss', substr(Filter::stripXmlTag($data), 0, 4));

        $data = file_get_contents('tests/fixtures/rue89.xml');
        $this->assertEquals('<rss', substr(Filter::stripXmlTag($data), 0, 4));

        $data = file_get_contents('tests/fixtures/cercle.psy.xml');
        $this->assertEquals('<rss', substr(Filter::stripXmlTag($data), 0, 4));

        $data = file_get_contents('tests/fixtures/lagrange.xml');
        $this->assertEquals('<feed', substr(Filter::stripXmlTag($data), 0, 5));

        $data = file_get_contents('tests/fixtures/atom.xml');
        $this->assertEquals('<feed', substr(trim(Filter::stripXmlTag($data)), 0, 5));

        $data = file_get_contents('tests/fixtures/atomsample.xml');
        $this->assertEquals('<feed', substr(trim(Filter::stripXmlTag($data)), 0, 5));

        $data = file_get_contents('tests/fixtures/planete-jquery.xml');
        $this->assertEquals('<rdf:RDF', trim(substr(trim(Filter::stripXmlTag($data)), 0, 8)));
    }


    public function testRelativeScheme()
    {
        $f = new Filter('<a href="//linuxfr.org">link</a>', 'http://blabla');
        $this->assertEquals('<a href="http://linuxfr.org" rel="noreferrer" target="_blank" >link</a>', $f->execute());
    }


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
        $this->assertEquals('<p>  truc</p>', $f->execute());
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
        $data = '<iframe src="http://www.kickstarter.com/projects/lefnire/habitrpg-mobile/widget/video.html" height="480" width="640" frameborder="0"></iframe>';

        $f = new Filter($data, 'http://blabla');
        $f->setIframeWhitelist(array('http://www.kickstarter.com'));
        $this->assertEquals($data, $f->execute());

        $data = '<iframe src="http://www.youtube.com/bla" height="480" width="640" frameborder="0"></iframe>';

        $f = new Filter($data, 'http://blabla');
        $f->setIframeWhitelist(array('http://www.kickstarter.com'));
        $this->assertEmpty($f->execute());
    }
}