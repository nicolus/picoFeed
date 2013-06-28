<?php

require_once 'lib/PicoFeed/Parser.php';
require_once 'lib/PicoFeed/Parsers/Rss20.php';

use PicoFeed\Parsers\Rss20;

class Rss20ParserTest extends PHPUnit_Framework_TestCase
{
    public function testFeedsReportedAsNotWorking()
    {
        $parser = new Rss20(file_get_contents('tests/fixtures/cercle.psy.xml'));
        $this->assertNotEquals(false, $parser->execute());
    }


    public function testFormatOk()
    {
        $parser = new Rss20(file_get_contents('tests/fixtures/rss2sample.xml'));
        $r = $parser->execute();

        $this->assertNotEquals(false, $r);

        $this->assertEquals('Liftoff News', $r->title);
        $this->assertEquals('http://liftoff.msfc.nasa.gov/', $r->url);
        $this->assertEquals('http://liftoff.msfc.nasa.gov/', $r->id);
        $this->assertEquals('1055217600', $r->updated);
        $this->assertEquals(4, count($r->items));

        $this->assertEquals('Star City', $r->items[0]->title);
        $this->assertEquals('http://liftoff.msfc.nasa.gov/news/2003/news-starcity.asp', $r->items[0]->url);
        $this->assertEquals('http://liftoff.msfc.nasa.gov/news/2003/news-starcity.asp', $r->items[0]->id);
        $this->assertEquals('1054633161', $r->items[0]->updated);
        $this->assertEquals('webmaster@example.com', $r->items[0]->author);
        //$this->assertEquals(224, strlen($r->items[0]->content));

        $parser = new Rss20(file_get_contents('tests/fixtures/rss20.xml'));
        $r = $parser->execute();

        $this->assertEquals('WordPress News', $r->title);
        $this->assertEquals('http://wordpress.org/news', $r->url);
        $this->assertEquals('http://wordpress.org/news', $r->id);
        $this->assertEquals('1359066183', $r->updated);
        $this->assertEquals(10, count($r->items));

        $this->assertEquals('WordPress 3.4.2 Maintenance and Security Release', $r->items[9]->title);
        $this->assertEquals('http://wordpress.org/news/2012/09/wordpress-3-4-2/', $r->items[9]->url);
        $this->assertEquals('http://wordpress.org/news/2012/09/wordpress-3-4-2/', $r->items[9]->id);
        $this->assertEquals('1346962041', $r->items[9]->updated);
        $this->assertEquals('Andrew Nacin', $r->items[9]->author);
        //$this->assertEquals(1443, strlen($r->items[9]->content));

        $parser = new Rss20(file_get_contents('tests/fixtures/pcinpact.xml'));
        $r = $parser->execute();

        $this->assertEquals('PC INpact', $r->title);
        $this->assertEquals('http://www.pcinpact.com/', $r->url);
        $this->assertEquals('http://www.pcinpact.com/', $r->id);
        $this->assertEquals('1365349197', $r->updated);
        $this->assertEquals(30, count($r->items));

        $this->assertEquals('La DCRI purge Wikipedia par la menace, un bel effet Streisand à la clé', $r->items[0]->title);
        $this->assertEquals('http://www.pcinpact.com/breve/78872-la-dcri-purge-wikipedia-par-menace-bel-effet-streisand-a-cle.htm?utm_source=PCi_RSS_Feed&utm_medium=news&utm_campaign=pcinpact', $r->items[0]->url);
        $this->assertEquals('http://www.pcinpact.com/breve/78872-la-dcri-purge-wikipedia-par-menace-bel-effet-streisand-a-cle.htm?utm_source=PCi_RSS_Feed&utm_medium=news&utm_campaign=pcinpact', $r->items[0]->id);
        $this->assertEquals('1365289860', $r->items[0]->updated);
        $this->assertEquals('', $r->items[0]->author);

        $parser = new Rss20(file_get_contents('tests/fixtures/fulltextrss.xml'));
        $r = $parser->execute();

        $this->assertEquals('Numerama.com - Magazine', $r->title);
        $this->assertEquals('http://www.numerama.com/', $r->url);
        $this->assertEquals('http://www.numerama.com/', $r->id);
        $this->assertEquals(time(), $r->updated);
        $this->assertEquals(6, count($r->items));

        $this->assertEquals('Brevets : un juge doute de la bonne volonté de Google et Apple', $r->items[0]->title);
        $this->assertEquals('http://www.numerama.com/magazine/25669-brevets-un-juge-doute-de-la-bonne-volonte-de-google-et-apple.html', $r->items[0]->url);
        $this->assertEquals('http://www.numerama.com/magazine/25669-brevets-un-juge-doute-de-la-bonne-volonte-de-google-et-apple.html', $r->items[0]->id);
        $this->assertEquals('1365781095', $r->items[0]->updated);
        $this->assertEquals('', $r->items[0]->author);
    }


    public function testBadInput()
    {
        $parser = new Rss20('ffhhghg');
        $this->assertFalse($parser->execute());
    }
}