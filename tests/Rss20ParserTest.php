<?php

require_once 'lib/PicoFeed/PicoFeed.php';
require_once 'lib/PicoFeed/Parsers/Rss20.php';

use PicoFeed\Parsers\Rss20;

class Rss20ParserTest extends PHPUnit_Framework_TestCase
{/*
    public function testBadInput()
    {
        $parser = new Rss20('boo');
        $this->assertFalse($parser->execute());
    }

    public function testFeedTitle()
    {
        $parser = new Rss20(file_get_contents('tests/fixtures/rss20.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertEquals('WordPress News', $feed->getTitle());

        $parser = new Rss20(file_get_contents('tests/fixtures/pcinpact.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertEquals('PC INpact', $feed->getTitle());
    }

    public function testFeedUrl()
    {
        $parser = new Rss20(file_get_contents('tests/fixtures/rss20.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertEquals('http://wordpress.org/news', $feed->getUrl());

        $parser = new Rss20(file_get_contents('tests/fixtures/pcinpact.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertEquals('http://www.pcinpact.com/', $feed->getUrl());
    }

    public function testFeedId()
    {
        $parser = new Rss20(file_get_contents('tests/fixtures/rss20.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertEquals('http://wordpress.org/news', $feed->getId());
    }

    public function testFeedDate()
    {
        $parser = new Rss20(file_get_contents('tests/fixtures/rss20.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertEquals(1359066183, $feed->getDate());

        $parser = new Rss20(file_get_contents('tests/fixtures/fulltextrss.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertEquals(time(), $feed->getDate());
    }

    public function testFeedLanguage()
    {
        $parser = new Rss20(file_get_contents('tests/fixtures/rss20.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertEquals('en-US', $feed->getLanguage());
        $this->assertEquals('en-US', $feed->items[0]->getLanguage());

        $parser = new Rss20(file_get_contents('tests/fixtures/zoot_egkty.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertEquals('ur', $feed->getLanguage());
        $this->assertEquals('ur', $feed->items[0]->getLanguage());

        $parser = new Rss20(file_get_contents('tests/fixtures/ibash.ru.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertEquals('ru', $feed->getLanguage());
        $this->assertEquals('ru', $feed->items[0]->getLanguage());
    }

    public function testItemId()
    {
        $parser = new Rss20(file_get_contents('tests/fixtures/rss20.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertNotEmpty($feed->items);
        $this->assertEquals($parser->generateId($feed->items[0]->getUrl(), $feed->getUrl()), $feed->items[0]->getId());

        $parser = new Rss20(file_get_contents('tests/fixtures/pcinpact.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertNotEmpty($feed->items);
        $this->assertEquals($parser->generateId($feed->items[0]->getUrl(), $feed->getUrl()), $feed->items[0]->getId());

        $parser = new Rss20(file_get_contents('tests/fixtures/fulltextrss.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertNotEmpty($feed->items);
        $this->assertEquals($parser->generateId($feed->items[0]->getUrl(), $feed->getUrl()), $feed->items[0]->getId());
    }

    public function testItemUrl()
    {
        $parser = new Rss20(file_get_contents('tests/fixtures/rss20.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertNotEmpty($feed->items);
        $this->assertEquals('http://wordpress.org/news/2013/01/wordpress-3-5-1/', $feed->items[0]->getUrl());

        $parser = new Rss20(file_get_contents('tests/fixtures/pcinpact.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertNotEmpty($feed->items);
        $this->assertEquals('http://www.pcinpact.com/breve/78872-la-dcri-purge-wikipedia-par-menace-bel-effet-streisand-a-cle.htm?utm_source=PCi_RSS_Feed&utm_medium=news&utm_campaign=pcinpact', $feed->items[0]->getUrl());
    }

    public function testItemTitle()
    {
        $parser = new Rss20(file_get_contents('tests/fixtures/rss20.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertNotEmpty($feed->items);
        $this->assertEquals('2012: A Look Back', $feed->items[1]->getTitle());
    }

    public function testItemDate()
    {
        $parser = new Rss20(file_get_contents('tests/fixtures/rss20.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertNotEmpty($feed->items);
        $this->assertEquals(1357006940, $feed->items[1]->getDate());

        $parser = new Rss20(file_get_contents('tests/fixtures/fulltextrss.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertNotEmpty($feed->items);
        $this->assertEquals(1365781095, $feed->items[0]->getDate());
    }

    public function testItemLanguage()
    {
        $parser = new Rss20(file_get_contents('tests/fixtures/rss20.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertNotEmpty($feed->items);
        $this->assertEquals('en-US', $feed->items[1]->getLanguage());
    }

    public function testItemAuthor()
    {
        $parser = new Rss20(file_get_contents('tests/fixtures/rss20.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertNotEmpty($feed->items);
        $this->assertEquals('Jen Mylo', $feed->items[1]->getAuthor());

        $parser = new Rss20(file_get_contents('tests/fixtures/rss2sample.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertNotEmpty($feed->items);
        $this->assertEquals('webmaster@example.com', $feed->items[2]->getAuthor());
    }

    public function testItemContent()
    {
        $parser = new Rss20(file_get_contents('tests/fixtures/rss20.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertNotEmpty($feed->items);
        $this->assertTrue(strpos($feed->items[1]->getContent(), '<p>Another year is coming') === 0);

        $parser = new Rss20(file_get_contents('tests/fixtures/rss2sample.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertNotEmpty($feed->items);
        $this->assertTrue(strpos($feed->items[1]->getContent(), '<p>Sky watchers in Europe') === 0);

        $parser = new Rss20(file_get_contents('tests/fixtures/ibash.ru.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertNotEmpty($feed->items);
        $this->assertTrue(strpos($feed->items[0]->getContent(), '<p>Хабр, обсуждение фейлов на работе: reaferon: Интернет') === 0);
    }

    public function testItemEnclosure()
    {
        $parser = new Rss20(file_get_contents('tests/fixtures/rue89.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertNotEmpty($feed->items);
        $this->assertEquals('http://rue89.feedsportal.com/c/33822/f/608948/e/1/s/2a687021/l/0L0Srue890N0Csites0Cnews0Cfiles0Cstyles0Cmosaic0Cpublic0Czapnet0Cthumbnail0Isquare0C20A130C0A40Ccahuzac0I10Bpng/cahuzac_1.png', $feed->items[0]->getEnclosureUrl());
        $this->assertEquals('image/png', $feed->items[0]->getEnclosureType());
    }
*/
    public function testFeedsReportedAsNotWorking()
    {
        $parser = new Rss20(file_get_contents('tests/fixtures/next_inpact_full.xml'));
        $feed = $parser->execute();
var_dump(\PicoFeed\Logging::getMessages());
        $this->assertNotFalse($feed);
        $this->assertNotEmpty($feed->items);

        $parser = new Rss20(file_get_contents('tests/fixtures/jeux-linux.fr.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertNotEmpty($feed->items);

        $parser = new Rss20(file_get_contents('tests/fixtures/cercle.psy.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertNotEmpty($feed->items);

        $parser = new Rss20(file_get_contents('tests/fixtures/resorts.xml'));
        $feed = $parser->execute();

        $this->assertNotFalse($feed);
        $this->assertNotEmpty($feed->items);
        $this->assertEquals('Hyatt  Rates', $feed->getTitle());
        $this->assertEquals('http://www.hyatt.com/rss/edeals/.jhtml', $feed->getUrl());
        $this->assertEquals(1, count($feed->getItems()));
        $this->assertEquals('Tuesday Jul 07,2009-Sunday Jul 19,2009', $feed->items[0]->getTitle());
        $this->assertEquals('http://www.hyatt.com/rss/edeals/.jhtml?19Jul09', $feed->items[0]->getUrl());
    }
}
