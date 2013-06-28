<?php

require_once 'lib/PicoFeed/Reader.php';
require_once 'lib/PicoFeed/Filter.php';

use PicoFeed\Filter;
use PicoFeed\Reader;

class FilterTest extends PHPUnit_Framework_TestCase
{
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
}