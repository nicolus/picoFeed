<?php

namespace PicoFeed\Serialization;

use PHPUnit\Framework\TestCase;

class SubscriptionListBuilderTest extends TestCase
{
    public function testWithoutTitle()
    {
        $subscriptionList = SubscriptionList::create()
            ->addSubscription(Subscription::create()
                ->setTitle('My feed 1')
                ->setFeedUrl('https://feed_url/')
                ->setSiteUrl('https://website_url/')
                ->setDescription('My feed description 1')
            )
            ->addSubscription(Subscription::create()
                ->setTitle('My feed 2')
                ->setFeedUrl('https://feed_url/')
                ->setSiteUrl('https://website_url/')
                ->setDescription('My feed description 2')
            )
        ;

        $expected = '<?xml version="1.0" encoding="UTF-8"?>
<opml version="1.0">
  <head/>
  <body>
    <outline type="rss" text="My feed 1" xmlUrl="https://feed_url/" title="My feed 1" description="My feed description 1" htmlUrl="https://website_url/"/>
    <outline type="rss" text="My feed 2" xmlUrl="https://feed_url/" title="My feed 2" description="My feed description 2" htmlUrl="https://website_url/"/>
  </body>
</opml>
';

        $this->assertEquals($expected, SubscriptionListBuilder::create($subscriptionList)->build());
    }

    public function testWithoutCategories()
    {
        $subscriptionList = SubscriptionList::create()
            ->setTitle('My feeds')
            ->addSubscription(Subscription::create()
                ->setTitle('My feed 1')
                ->setFeedUrl('https://feed_url/')
                ->setSiteUrl('https://website_url/')
                ->setDescription('My feed description 1')
            )
            ->addSubscription(Subscription::create()
                ->setTitle('My feed 2')
                ->setFeedUrl('https://feed_url/')
                ->setSiteUrl('https://website_url/')
                ->setDescription('My feed description 2')
            )
        ;

        $opmlBuilder = new SubscriptionListBuilder($subscriptionList);
        $opml = $opmlBuilder->build();

        $expected = '<?xml version="1.0" encoding="UTF-8"?>
<opml version="1.0">
  <head>
    <title>My feeds</title>
  </head>
  <body>
    <outline type="rss" text="My feed 1" xmlUrl="https://feed_url/" title="My feed 1" description="My feed description 1" htmlUrl="https://website_url/"/>
    <outline type="rss" text="My feed 2" xmlUrl="https://feed_url/" title="My feed 2" description="My feed description 2" htmlUrl="https://website_url/"/>
  </body>
</opml>
';

        $this->assertEquals($expected, $opml);
    }

    public function testWithCategories()
    {
        $subscriptionList = SubscriptionList::create()
            ->setTitle('My feeds')
            ->addSubscription(Subscription::create()
                ->setCategory('Category A')
                ->setTitle('My feed 1')
                ->setFeedUrl('https://feed_url/')
                ->setSiteUrl('https://website_url/')
                ->setDescription('My feed description 1')
            )
            ->addSubscription(Subscription::create()
                ->setCategory('Category A')
                ->setTitle('My feed 2')
                ->setFeedUrl('https://feed_url/')
                ->setSiteUrl('https://website_url/')
                ->setDescription('My feed description 2')
            )
            ->addSubscription(Subscription::create()
                ->setCategory('Category B')
                ->setTitle('My feed 3')
                ->setFeedUrl('https://feed_url/')
                ->setSiteUrl('https://website_url/')
                ->setDescription('My feed description 3')
            )
        ;

        $opmlBuilder = new SubscriptionListBuilder($subscriptionList);
        $opml = $opmlBuilder->build();

        $expected = '<?xml version="1.0" encoding="UTF-8"?>
<opml version="1.0">
  <head>
    <title>My feeds</title>
  </head>
  <body>
    <outline text="Category A">
      <outline type="rss" text="My feed 1" xmlUrl="https://feed_url/" title="My feed 1" description="My feed description 1" htmlUrl="https://website_url/"/>
      <outline type="rss" text="My feed 2" xmlUrl="https://feed_url/" title="My feed 2" description="My feed description 2" htmlUrl="https://website_url/"/>
    </outline>
    <outline text="Category B">
      <outline type="rss" text="My feed 3" xmlUrl="https://feed_url/" title="My feed 3" description="My feed description 3" htmlUrl="https://website_url/"/>
    </outline>
  </body>
</opml>
';

        $this->assertEquals($expected, $opml);
    }
}
