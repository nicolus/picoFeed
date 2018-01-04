<?php

namespace PicoFeed\Syndication;

use DateTime;
use PHPUnit\Framework\TestCase;

class Rss20WriterTest extends TestCase
{
    public function testWriter()
    {
        $feedBuilder = Rss20FeedBuilder::create()
            ->withTitle('My website')
            ->withAuthor('FooBar', 'foo@bar')
            ->withFeedUrl('https://feed_url/')
            ->withSiteUrl('https://site_url/')
            ->withDate(new DateTime());

        for ($i = 1; $i <= 2; $i++) {
            $feedBuilder
                ->withItem(Rss20ItemBuilder::create($feedBuilder)
                    ->withTitle('My article '.$i)
                    ->withUrl('https://site_url/article'.$i)
                    ->withAuthor('John Doe', 'john@doe')
                    ->withPublishedDate(new DateTime())
                    ->withSummary('My article summary '.$i)
                    ->withContent('<p>My article content '.$i.'</p>')
                );
        }

        $xml = $feedBuilder->build();

        $expected = '<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:atom="http://www.w3.org/2005/Atom">
  <channel>
    <generator>PicoFeed (https://github.com/miniflux/picoFeed)</generator>
    <title>My website</title>
    <description>My website</description>
    <pubDate>'.date(DATE_RSS).'</pubDate>
    <webMaster>foo@bar (FooBar)</webMaster>
    <link>https://site_url/</link>
    <atom:link href="https://feed_url/" rel="self" type="application/rss+xml"/>
    <item>
      <guid isPermaLink="true">https://site_url/article1</guid>
      <title>My article 1</title>
      <link>https://site_url/article1</link>
      <pubDate>'.date(DATE_RSS).'</pubDate>
      <author>john@doe (John Doe)</author>
      <description>My article summary 1</description>
      <content:encoded><![CDATA[<p>My article content 1</p>]]></content:encoded>
    </item>
    <item>
      <guid isPermaLink="true">https://site_url/article2</guid>
      <title>My article 2</title>
      <link>https://site_url/article2</link>
      <pubDate>'.date(DATE_RSS).'</pubDate>
      <author>john@doe (John Doe)</author>
      <description>My article summary 2</description>
      <content:encoded><![CDATA[<p>My article content 2</p>]]></content:encoded>
    </item>
  </channel>
</rss>
';

        $this->assertEquals($expected, $xml);
    }
}
