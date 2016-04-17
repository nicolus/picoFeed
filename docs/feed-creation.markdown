Syndication
===========

PicoFeed can also generate Atom and RSS 2.0 feeds.

Generate RSS 2.0 Feed
---------------------

```php
<?php

use PicoFeed\Syndication\Rss20FeedBuilder;
use PicoFeed\Syndication\Rss20ItemBuilder;

$feedBuilder = Rss20FeedBuilder::create()
    ->withTitle('My website')
    ->withAuthor('FooBar', 'foo@bar')
    ->withFeedUrl('https://feed_url/')
    ->withSiteUrl('https://site_url/')
    ->withDate(new DateTime());

$feedBuilder
    ->withItem(Rss20ItemBuilder::create($feedBuilder)
        ->withTitle('My article')
        ->withUrl('https://site_url/article')
        ->withAuthor('John Doe', 'john@doe')
        ->withPublishedDate(new DateTime())
        ->withSummary('My article summary')
        ->withContent('<p>My article content</p>')
    );

echo $feedBuilder->build();
```

You can also write the feed content directly to a file with `$feedBuilder->build('/path/to/feed.xml');`.

Generate Atom Feed
------------------

```php
<?php

use PicoFeed\Syndication\AtomFeedBuilder;
use PicoFeed\Syndication\AtomItemBuilder;

$feedBuilder = AtomFeedBuilder::create()
    ->withTitle('My website')
    ->withAuthor('FooBar', 'foo@bar', 'https://foobar/')
    ->withFeedUrl('https://feed_url/')
    ->withSiteUrl('https://site_url/')
    ->withDate(new DateTime());

$feedBuilder
    ->withItem(AtomItemBuilder::create($feedBuilder)
        ->withTitle('My article')
        ->withUrl('https://site_url/article')
        ->withAuthor('John Doe', 'john@doe', 'https://johndoe/')
        ->withPublishedDate(new DateTime())
        ->withUpdatedDate(new DateTime())
        ->withSummary('My article summary')
        ->withContent('<p>My article content</p>')
    );

echo $feedBuilder->build();
```
