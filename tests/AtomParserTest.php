<?php

require_once 'lib/PicoFeed/Parser.php';
require_once 'lib/PicoFeed/Parsers/Atom.php';

use PicoFeed\Parsers\Atom;

class AtomParserTest extends PHPUnit_Framework_TestCase
{
    public function testFormatOk()
    {
        $parser = new Atom(file_get_contents('tests/fixtures/atomsample.xml'));
        $r = $parser->execute();

        $this->assertEquals('Example Feed', $r->title);
        $this->assertEquals('http://example.org/', $r->url);
        $this->assertEquals('urn:uuid:60a76c80-d399-11d9-b93C-0003939e0af6', $r->id);
        $this->assertEquals(1071358202, $r->updated);
        $this->assertEquals(1, count($r->items));

        $this->assertEquals('Atom-Powered Robots Run Amok', $r->items[0]->title);
        $this->assertEquals('http://example.org/2003/12/13/atom03', $r->items[0]->url);
        $this->assertEquals('34ce9ad8', $r->items[0]->id);
        $this->assertEquals(1071358202, $r->items[0]->updated);
        $this->assertEquals('John Doe', $r->items[0]->author);
        $this->assertEquals('<p>Some text.</p>', $r->items[0]->content);


        $parser = new Atom(file_get_contents('tests/fixtures/atom.xml'));
        $r = $parser->execute();

        $this->assertEquals('The Official Google Blog', $r->title);
        $this->assertEquals('http://googleblog.blogspot.com/', $r->url);
        $this->assertEquals('tag:blogger.com,1999:blog-10861780', $r->id);
        $this->assertEquals(1360166333, $r->updated);
        $this->assertEquals(25, count($r->items));

        $this->assertEquals('A Chrome Experiment made with some friends from Oz', $r->items[0]->title);
        $this->assertEquals('http://feedproxy.google.com/~r/blogspot/MKuf/~3/S_hccisqTW8/a-chrome-experiment-made-with-some.html', $r->items[0]->url);
        $this->assertEquals('2dd9c510', $r->items[0]->id);
        $this->assertEquals(1360072941, $r->items[0]->updated);
        $this->assertEquals('Emily Wood', $r->items[0]->author);
        //$this->assertEquals(3227, strlen($r->items[0]->content));

        //var_dump($r->items[10]->content);
    }


    public function testBadInput()
    {
        $parser = new Atom('ffhhghg');
        $this->assertFalse($parser->execute());
    }


    public function testMultipleLink()
    {
        $parser = new Atom(file_get_contents('tests/fixtures/lagrange.xml'));
        $r = $parser->execute();

        $this->assertEquals('http://www.la-grange.net/', $r->url);

        $parser = new Atom(file_get_contents('tests/fixtures/atom.xml'));
        $r = $parser->execute();

        $this->assertEquals('http://googleblog.blogspot.com/', $r->url);
    }
}