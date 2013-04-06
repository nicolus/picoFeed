<?php

require_once 'lib/PicoFeed/Export.php';

use PicoFeed\Export;

class ExportTest extends PHPUnit_Framework_TestCase
{
    public function testOuput()
    {
        $feeds = array(
            array(
                'title' => 'Site title',
                'description' => 'Optional description',
                'site_url' => 'http://blabla.fr/',
            ),
            array(
                'title' => 'Site title',
                'description' => 'Optional description',
                'site_url' => 'http://petitcodeur.fr/',
                'feed_url' => 'http://petitcodeur.fr/feed.xml'
            )
        );

        $export = new Export($feeds);
        $opml = $export->execute();

        //echo $opml;
    }
}