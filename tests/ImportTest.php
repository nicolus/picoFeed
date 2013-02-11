<?php

require_once 'lib/PicoFeed/Import.php';

use PicoFeed\Import;

class ImportTest extends PHPUnit_Framework_TestCase
{
    public function testFormat()
    {
        $import = new Import(file_get_contents('tests/fixtures/subscriptionList.opml'));
        $entries = $import->execute();

        $this->assertEquals(14, count($entries));
        $this->assertEquals('CNET News.com', $entries[0]->title);
        $this->assertEquals('http://news.com.com/2547-1_3-0-5.xml', $entries[0]->feed_url);
        $this->assertEquals('http://news.com.com/', $entries[0]->site_url);
    }
}