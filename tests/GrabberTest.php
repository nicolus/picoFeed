<?php

require_once 'lib/PicoFeed/Reader.php';
require_once 'lib/PicoFeed/Grabber.php';

use PicoFeed\Reader;
use PicoFeed\Grabber;

class GrabberTest extends PHPUnit_Framework_TestCase
{
    public function testGrabContentWithCandidates()
    {
        $grabber = new Grabber('http://www.lemonde.fr/proche-orient/article/2013/08/30/la-france-nouvelle-plus-ancienne-alliee-des-etats-unis_3469218_3218.html');
        $this->assertTrue($grabber->download());

        $grabber = new Grabber('http://www.rue89.com/2013/08/30/faisait-boris-boillon-ex-sarko-boy-350-000-euros-gare-nord-245315');
        $this->assertTrue($grabber->download());

        $grabber = new Grabber('http://montreal.ctvnews.ca/quebec-premier-has-positive-words-for-enbridge-pipeline-project-1.1432695');
        $this->assertTrue($grabber->download());

        $grabber = new Grabber('http://www.inc.com/suzanne-lucas/why-employee-turnover-is-so-costly.html');
        $this->assertTrue($grabber->download());

        $grabber = new Grabber('http://arstechnica.com/information-technology/2013/08/sysadmin-security-fail-nsa-finds-snowden-hijacked-officials-logins/');
        $this->assertTrue($grabber->download());

        //var_dump($grabber->content);
    }

    public function testGetRules()
    {
        $grabber = new Grabber('http://www.egscomics.com/index.php?id=1690');
        $this->assertTrue(is_array($grabber->getRules()));
    }

    public function testGrabContent()
    {
        $grabber = new Grabber('http://www.egscomics.com/index.php?id=1690');
        $this->assertTrue($grabber->download());

        $this->assertEquals('<img title="2013-08-22" src="comics/../comics/1377151029-2013-08-22.png" id="comic" border="0" />', $grabber->content);
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
    }

    public function testAllFilters()
    {
        $dir = new DirectoryIterator('lib/PicoFeed/Rules/');

        foreach ($dir as $fileinfo) {

            if ($fileinfo->getExtension() == 'php') {

                $rule = include $fileinfo->getRealPath();

                if (isset($rule['test_url'])) {

                    $grabber = new Grabber($rule['test_url']);
                    $r = $grabber->download();

                    if (! $r) {
                        var_dump($rule);
                        var_dump($grabber->content);
                    }

                    $this->assertTrue($r);
                }
            }
        }
    }
}
