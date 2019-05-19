<?php

namespace PicoFeed\Scraper;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use PicoFeed\Reader\Reader;
use PicoFeed\Config\Config;

class ScraperTest extends TestCase
{

    public function testUrlScraper()
    {
        $mock = new MockHandler([
            new Response(
                200,
                ['content-Type' => 'text/html',],
                file_get_contents(__DIR__ . '/../fixtures/html_scraper_lemonde.html')
            ),
            new Response(
                200,
                ['content-Type' => 'text/html',],
                file_get_contents(__DIR__ . '/../fixtures/html_scraper_inc.html')
            ),
            new Response(
                200,
                ['content-Type' => 'text/html',],
                file_get_contents(__DIR__ . '/../fixtures/html_scraper_arstechnica.html')
            ),
        ]);
        $handler = HandlerStack::create($mock);

        $httpClient = new GuzzleClient(['handler' => $handler]);


        $grabber = new Scraper(new Config(), $httpClient);
        $grabber->setUrl('http://www.lemonde.fr/proche-orient/article/2013/08/30/la-france-nouvelle-plus-ancienne-alliee-des-etats-unis_3469218_3218.html');
        $grabber->execute();
        $this->assertTrue($grabber->hasRelevantContent());

        $grabber = new Scraper(new Config(), $httpClient);
        $grabber->setUrl('http://www.inc.com/suzanne-lucas/why-employee-turnover-is-so-costly.html');
        $grabber->execute();
        $this->assertTrue($grabber->hasRelevantContent());

        $grabber = new Scraper(new Config(), $httpClient);
        $grabber->setUrl('http://arstechnica.com/information-technology/2013/08/sysadmin-security-fail-nsa-finds-snowden-hijacked-officials-logins/');
        $grabber->execute();
        $this->assertTrue($grabber->hasRelevantContent());
    }


    public function testRuleParser()
    {
        $mock = new MockHandler([
            new Response(
                200,
                ['content-Type' => 'text/html',],
                file_get_contents(__DIR__ . '/../fixtures/html_scraper_egscomic.html')
            ),
        ]);
        $handler = HandlerStack::create($mock);

        $grabber = new Scraper(new Config(), new GuzzleClient(['handler' => $handler]));
        $grabber->setUrl('http://www.egscomics.com/index.php?id=1690');
        $grabber->execute();
        $this->assertTrue($grabber->hasRelevantContent());

        $this->assertEquals('<img title="2013-08-22" src="http://egscomics.com/comics/../comics/1377151029-2013-08-22.png" id="cc-comic"/>', $grabber->getRelevantContent());
    }

    public function testRssGrabContent()
    {
        $mock = new MockHandler([
            new Response(
                200,
                ['content-Type' => 'text/html',],
                file_get_contents(__DIR__ . '/../fixtures/rss_egscomics.xml')
            ),
        ]);
        $handler = HandlerStack::create($mock);

        $reader = new Reader(new config(), new GuzzleClient(['handler' => $handler]));
        $client = $reader->download('http://www.egscomics.com/rss.php');
        $parser = $reader->getParser($client->getUrl(), $client->getContent(), $client->getEncoding());
        $parser->enableContentGrabber();
        $feed = $parser->execute();

        $this->assertTrue(is_array($feed->items));
        $this->assertTrue(strpos($feed->items[0]->content, '<img') >= 0);
    }

    public function testContentGrabberCallback()
    {
        $mock = new MockHandler([
            new Response(
                200,
                ['content-Type' => 'text/html',],
                file_get_contents(__DIR__ . '/../fixtures/rss_egscomics.xml')
            ),
        ]);
        $handler = HandlerStack::create($mock);

        $reader = new Reader(new config(), new GuzzleClient(['handler' => $handler]));
        $client = $reader->download('http://www.egscomics.com/rss.php');
        $parser = $reader->getParser($client->getUrl(), $client->getContent(), $client->getEncoding());
        $that   = $this;
        $parser->enableContentGrabber(false, function($feed, $item, $scraper) use ($that) {
            $that->assertInstanceOf('PicoFeed\Scraper\Scraper', $scraper);
        });
        $parser->execute();
    }
}
