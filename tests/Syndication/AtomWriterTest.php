<?php

namespace PicoFeed\Syndication;

use DateTime;
use PHPUnit\Framework\TestCase;

class AtomWriterTest extends TestCase
{
    public function testWriter()
    {
        $feedBuilder = AtomFeedBuilder::create()
            ->withTitle('My website')
            ->withAuthor('FooBar', 'foo@bar', 'https://foobar/')
            ->withFeedUrl('https://feed_url/')
            ->withSiteUrl('https://site_url/')
            ->withDate(new DateTime());

        for ($i = 1; $i <= 2; $i++) {
            $feedBuilder
                ->withItem(AtomItemBuilder::create($feedBuilder)
                    ->withTitle('My article '.$i)
                    ->withUrl('https://site_url/article'.$i)
                    ->withAuthor('John Doe', 'john@doe', 'https://johndoe/')
                    ->withPublishedDate(new DateTime())
                    ->withUpdatedDate(new DateTime())
                    ->withSummary('My article summary '.$i)
                    ->withContent('<p>My article content '.$i.'</p>')
                );
        }

        $xml = $feedBuilder->build();


        $expected = '<?xml version="1.0" encoding="UTF-8"?>
<feed xmlns="http://www.w3.org/2005/Atom">
  <generator uri="https://github.com/miniflux/picoFeed">PicoFeed</generator>
  <title>My website</title>
  <id>https://feed_url/</id>
  <updated>'.date(DATE_ATOM).'</updated>
  <link rel="alternate" type="text/html" href="https://site_url/"/>
  <link rel="self" type="application/atom+xml" href="https://feed_url/"/>
  <author>
    <name>FooBar</name>
    <email>foo@bar</email>
    <uri>https://foobar/</uri>
  </author>
  <entry>
    <id>https://site_url/article1</id>
    <title>My article 1</title>
    <link rel="alternate" type="text/html" href="https://site_url/article1"/>
    <updated>'.date(DATE_ATOM).'</updated>
    <published>'.date(DATE_ATOM).'</published>
    <author>
      <name>John Doe</name>
      <email>john@doe</email>
      <uri>https://johndoe/</uri>
    </author>
    <summary>My article summary 1</summary>
    <content type="html"><![CDATA[<p>My article content 1</p>]]></content>
  </entry>
  <entry>
    <id>https://site_url/article2</id>
    <title>My article 2</title>
    <link rel="alternate" type="text/html" href="https://site_url/article2"/>
    <updated>'.date(DATE_ATOM).'</updated>
    <published>'.date(DATE_ATOM).'</published>
    <author>
      <name>John Doe</name>
      <email>john@doe</email>
      <uri>https://johndoe/</uri>
    </author>
    <summary>My article summary 2</summary>
    <content type="html"><![CDATA[<p>My article content 2</p>]]></content>
  </entry>
</feed>
';

        $this->assertEquals($expected, $xml);
    }
}
