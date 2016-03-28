<?php

namespace PicoFeed\Parser;

use PHPUnit_Framework_TestCase;
use PicoFeed\Config\Config;

class GetGrabberTest extends PHPUnit_Framework_TestCase
{
    public function testGrabberInstance()
    {
        $parser = new Atom(file_get_contents('tests/fixtures/atomsample.xml'));
        $parser->setConfig(new Config());
        $parser->enableContentGrabber();
        $parser->execute();

        $this->assertInstanceOf('PicoFeed\Scraper\Scraper', $parser->getGrabber());
    }
}
