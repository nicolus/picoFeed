<?php

require_once 'lib/PicoFeed/Parser.php';
require_once 'lib/PicoFeed/Parsers/Rss91.php';

use PicoFeed\Parsers\Rss91;

class Rss91ParserTest extends PHPUnit_Framework_TestCase
{
    public function testFormatOk()
    {
        $parser = new Rss91(file_get_contents('tests/fixtures/rss_0.91.xml'));
        $r = $parser->execute();

        $this->assertEquals('WriteTheWeb', $r->title);
        $this->assertEquals('http://writetheweb.com', $r->url);
        $this->assertEquals('http://writetheweb.com', $r->id);
        $this->assertEquals(time(), $r->updated);
        $this->assertEquals(6, count($r->items));

        $this->assertEquals('Giving the world a pluggable Gnutella', $r->items[0]->title);
        $this->assertEquals('http://writetheweb.com/read.php?item=24', $r->items[0]->url);
        $this->assertEquals('5f9fc1c2', $r->items[0]->id);
        $this->assertEquals(time(), $r->items[0]->updated);
        $this->assertEquals('webmaster@writetheweb.com', $r->items[0]->author);
    }
}