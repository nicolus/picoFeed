<?php

namespace PicoFeed\Serialization;

use PHPUnit\Framework\TestCase;

class SubscriptionListParserTest extends TestCase
{
    public function testMalFormedFormat()
    {
        $this->expectException('PicoFeed\Parser\MalformedXmlException');
        SubscriptionListParser::create('foobar')->parse();
    }

    public function testFormat()
    {
        $subscriptionList = SubscriptionListParser::create(file_get_contents('tests/fixtures/subscriptionList.opml'))->parse();

        $this->assertEquals('mySubscriptions.opml', $subscriptionList->getTitle());
        $this->assertCount(14, $subscriptionList->subscriptions);
        $this->assertEquals('CNET News.com', $subscriptionList->subscriptions[0]->getTitle());
        $this->assertEquals('http://news.com.com/2547-1_3-0-5.xml', $subscriptionList->subscriptions[0]->getFeedUrl());
        $this->assertEquals('http://news.com.com/', $subscriptionList->subscriptions[0]->getSiteUrl());
        $this->assertEquals('rss', $subscriptionList->subscriptions[0]->getType());
        $this->assertNotEmpty($subscriptionList->subscriptions[0]->getDescription());
    }

    public function testGoogleReader()
    {
        $subscriptionList = SubscriptionListParser::create(file_get_contents('tests/fixtures/google-reader.opml'))->parse();

        $this->assertEquals('Abonnements dans Google Reader', $subscriptionList->getTitle());
        $this->assertcount(22, $subscriptionList->subscriptions);
        $this->assertEquals('Code', $subscriptionList->subscriptions[21]->getCategory());
        $this->assertEquals('Vimeo / CocoaheadsRNS', $subscriptionList->subscriptions[21]->getTitle());
        $this->assertEquals('http://vimeo.com/cocoaheadsrns/videos/rss', $subscriptionList->subscriptions[21]->getFeedUrl());
        $this->assertEquals('http://vimeo.com/cocoaheadsrns/videos', $subscriptionList->subscriptions[21]->getSiteUrl());
    }

    public function testTinyTinyRss()
    {
        $subscriptionList = SubscriptionListParser::create(file_get_contents('tests/fixtures/tinytinyrss.opml'))->parse();

        $this->assertCount(2, $subscriptionList->subscriptions);
        $this->assertEquals('coding', $subscriptionList->subscriptions[1]->getCategory());
        $this->assertEquals('Planète jQuery', $subscriptionList->subscriptions[1]->getTitle());
        $this->assertEquals('http://feeds.feedburner.com/PlaneteJqueryFr', $subscriptionList->subscriptions[1]->getFeedUrl());
        $this->assertEquals('http://planete-jquery.fr', $subscriptionList->subscriptions[1]->getSiteUrl());
    }

    public function testNewsBeuter()
    {
        $subscriptionList = SubscriptionListParser::create(file_get_contents('tests/fixtures/newsbeuter.opml'))->parse();

        $this->assertCount(35, $subscriptionList->subscriptions);
        $this->assertEquals('', $subscriptionList->subscriptions[1]->getCategory());
        $this->assertEquals('code.flickr.com', $subscriptionList->subscriptions[1]->getTitle());
        $this->assertEquals('http://code.flickr.net/feed/', $subscriptionList->subscriptions[1]->getFeedUrl());
        $this->assertEquals('http://code.flickr.net', $subscriptionList->subscriptions[1]->getSiteUrl());
    }
}
