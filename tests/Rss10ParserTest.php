<?php

require_once 'lib/PicoFeed/Parser.php';
require_once 'lib/PicoFeed/Parsers/Rss10.php';

use PicoFeed\Parsers\Rss10;

class Rss10ParserTest extends PHPUnit_Framework_TestCase
{
    public function testFormatOk()
    {
        $parser = new Rss10(file_get_contents('tests/fixtures/planete-jquery.xml'));
        $r = $parser->execute();

        $this->assertEquals('Planète jQuery : l\'actualité jQuery, plugins jQuery et tutoriels jQuery en français', $r->title);
        $this->assertEquals('http://planete-jquery.fr', $r->url);
        $this->assertEquals('http://planete-jquery.fr', $r->id);
        $this->assertEquals(20, count($r->items));

        $this->assertEquals('MathieuRobin : Chroniques jQuery, épisode 108', $r->items[0]->title);
        $this->assertEquals('http://www.mathieurobin.com/2013/03/chroniques-jquery-episode-108/', $r->items[0]->url);
        $this->assertEquals('5b48b716', $r->items[0]->id);
        $this->assertEquals('MathieuRobin', $r->items[0]->author);
        $this->assertEquals('<p>Hello tout le monde', substr($r->items[0]->content, 0, 22));
    }


    public function testBadInput()
    {
        $parser = new Rss10('ffhhghg');
        $this->assertFalse($parser->execute());
    }
}