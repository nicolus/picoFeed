<?php

require_once 'lib/PicoFeed/Parser.php';
require_once 'lib/PicoFeed/Parsers/Rss92.php';

use PicoFeed\Rss92;

class Rss92ParserTest extends PHPUnit_Framework_TestCase
{
    public function testFormatOk()
    {
        $parser = new Rss92(file_get_contents('tests/fixtures/univers_freebox.xml'));
        $r = $parser->execute();

        $this->assertEquals('Univers Freebox', $r->title);
        $this->assertEquals('http://www.universfreebox.com', $r->url);
        $this->assertEquals('http://www.universfreebox.com', $r->id);
        $this->assertEquals(time(), $r->updated);
        $this->assertEquals(30, count($r->items));

        $this->assertEquals('Retour de Xavier Niel sur Twitter, « sans initiative privée, pas de révolution #Born2code »', $r->items[0]->title);
        $this->assertEquals('http://www.universfreebox.com/article20302.html', $r->items[0]->url);
        $this->assertEquals('http://www.universfreebox.com/article20302.html', $r->items[0]->id);
        $this->assertEquals('1364240600', $r->items[0]->updated);
        $this->assertEquals('', $r->items[0]->author);
    }
}