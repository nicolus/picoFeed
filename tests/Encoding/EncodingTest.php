<?php

namespace PicoFeed\Filter;

use PHPUnit\Framework\TestCase;
use PicoFeed\Config\Config;
use PicoFeed\Parser\Rss20;

class EncodingTest extends TestCase
{
    public function testTranslitIsoToUtf8()
    {
        $parser = new Rss20(file_get_contents(__DIR__.'/../../tests/fixtures/rss_20_iso8859-15.xml'));
        $feed = $parser->execute();

        $content = $feed->getItems()[0]->getContent();

        $this->assertEquals($content, '<p>éàùç€@ïî</p>');
    }
}
