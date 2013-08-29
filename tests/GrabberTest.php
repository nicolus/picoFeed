<?php

require_once 'lib/PicoFeed/Reader.php';
require_once 'lib/PicoFeed/Grabber.php';

use PicoFeed\Reader;
use PicoFeed\Grabber;

class GrabberTest extends PHPUnit_Framework_TestCase
{/*
    public function testGetRules()
    {
        $grabber = new Grabber('http://www.egscomics.com/index.php?id=1690');
        $this->assertTrue(is_array($grabber->getRules()));
    }

    public function testGrabContent()
    {
        $grabber = new Grabber('http://www.egscomics.com/index.php?id=1690');
        $grabber->download();

        $this->assertEquals('El Goonish Shive - 2013-08-22', $grabber->title);
        $this->assertEquals('<img title="2013-08-22" src="comics/../comics/1377151029-2013-08-22.png" id="comic" border="0" />', $grabber->content);
        $this->assertTrue($grabber->download());
    }

    public function testRssGrabContent()
    {
        $reader = new Reader;
        $reader->download('http://www.egscomics.com/rss.php');

        $parser = $reader->getParser();
        $this->assertTrue($parser !== false);

        $parser->grabber = true;
        $feed = $parser->execute();

        $this->assertTrue(is_array($feed->items));
        $this->assertTrue(strpos($feed->items[0]->content, '<img') >= 0);
    }*/

    public function testAllFilters()
    {
        $dir = new DirectoryIterator('lib/PicoFeed/Rules/');

        foreach ($dir as $fileinfo) {

            if ($fileinfo->getExtension() == 'php') {

                $rule = include $fileinfo->getRealPath();

                if (isset($rule['test_url'])) {

                    print_r($rule);

                    $grabber = new Grabber($rule['test_url']);
                    $this->assertTrue($grabber->download());
                    var_dump($grabber->title, strlen($grabber->content));
                }
            }
        }
    }
}
