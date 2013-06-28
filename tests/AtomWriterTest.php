<?php

require_once 'lib/PicoFeed/Writers/Atom.php';

use PicoFeed\Writers\Atom;

class AtomWriterTest extends PHPUnit_Framework_TestCase
{
    public function testWriter()
    {
        $writer = new Atom();
        $writer->title = 'My site';
        $writer->site_url = 'http://boo/';
        $writer->feed_url = 'http://boo/feed.atom';
        $writer->author = 'Me';

        $writer->items[] = array(
            'title' => 'My article 1',
            'updated' => strtotime('-2 days'),
            'url' => 'http://foo/bar',
            'summary' => 'Super summary',
            'content' => '<p>content</p>'
        );

        $writer->items[] = array(
            'title' => 'My article 2',
            'updated' => strtotime('-1 day'),
            'url' => 'http://foo/bar2',
            'summary' => 'Super summary 2',
            'content' => '<p>content 2 &nbsp; &copy; 2015</p>',
            'author' => 'Me too'
        );

        $output = $writer->execute();

        //var_dump($output);
    }
}