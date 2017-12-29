<?php

namespace PicoFeed\Generator;

use PHPUnit\Framework\TestCase;
use PicoFeed\Parser\Item;

class YoutubeContentGeneratorTest extends TestCase
{
    public function testGenerateHtmlFromXmlContent()
    {
        $xml = simplexml_load_string('<feed xmlns:yt="http://www.youtube.com/xml/schemas/2015"><entry><id>test123</id><yt:videoId>test123</yt:videoId></entry></feed>');

        $item = new Item();
        $item->namespaces = array('yt' => 'http://www.youtube.com/xml/schemas/2015');
        $item->xml = $xml;

        $generator = new YoutubeContentGenerator();

        $this->assertTrue($generator->execute($item));
        $this->assertEquals(
            '<iframe width="560" height="315" src="//www.youtube.com/embed/test123" frameborder="0"></iframe>',
            $item->getContent()
        );
    }

    public function testGenerateHtmlFromLink()
    {
        $item = new Item();
        $item->setUrl('http://www.youtube.com/watch?v=test123');

        $generator = new YoutubeContentGenerator();

        $this->assertTrue($generator->execute($item));
        $this->assertEquals(
            '<iframe width="560" height="315" src="//www.youtube.com/embed/test123" frameborder="0"></iframe>',
            $item->getContent()
        );
    }

    public function testSkipContentGeneration()
    {
        $item = new Item();
        $item->setUrl('http://localhost/document.html');

        $generator = new YoutubeContentGenerator();

        $this->assertFalse($generator->execute($item));
        $this->assertEquals('', $item->getContent());
    }
}
