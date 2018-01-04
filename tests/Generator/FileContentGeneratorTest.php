<?php

namespace PicoFeed\Generator;

use PHPUnit\Framework\TestCase;
use PicoFeed\Parser\Item;

class FileContentGeneratorTest extends TestCase
{
    public function testGenerateHtml()
    {
        $item = new Item();
        $item->setUrl('http://localhost/document.pdf');

        $generator = new FileContentGenerator();

        $this->assertTrue($generator->execute($item));
        $this->assertEquals(
            '<a href="http://localhost/document.pdf" target="_blank">http://localhost/document.pdf</a>',
            $item->getContent()
        );
    }

    public function testSkipContentGeneration()
    {
        $item = new Item();
        $item->setUrl('http://localhost/document.html');

        $generator = new FileContentGenerator();

        $this->assertFalse($generator->execute($item));
        $this->assertEquals('', $item->getContent());
    }
}
