Web scraper
===========

The web scraper is useful for feeds that display only a summary of articles, the scraper can download and parse the full content from the original website.

How the content grabber works?
------------------------------

1. Try with rules first (xpath patterns) for the domain name (see `PicoFeed\Rules\`)
2. Try to find the text content by using common attributes for class and id
3. Finally, if nothing is found, the feed content is displayed

The content downloader use a fake user agent, actually Google Chrome under Mac Os X.

**The best results are obtained with Xpath rules file.**

How to write a grabber rules file?
----------------------------------

Add a PHP file to the directory `PicoFeed\Rules`, the filename must be the domain name:

Example with the BBC website, `www.bbc.co.uk.php`:

```php
<?php
return array(
    'test_url' => 'http://www.bbc.co.uk/news/world-middle-east-23911833',
    'body' => array(
        '//div[@class="story-body"]',
    ),
    'strip' => array(
        '//script',
        '//form',
        '//style',
        '//*[@class="story-date"]',
        '//*[@class="story-header"]',
        '//*[@class="story-related"]',
        '//*[contains(@class, "byline")]',
        '//*[contains(@class, "story-feature")]',
        '//*[@id="video-carousel-container"]',
        '//*[@id="also-related-links"]',
        '//*[contains(@class, "share") or contains(@class, "hidden") or contains(@class, "hyper")]',
    )
);
```

Actually, only `body`, `strip` and `test_url` are supported.

Don't forget to send a pull request or a ticket to share your contribution with everybody,

### How to use the content scraper?

```php
use PicoFeed\Reader;

$reader = new Reader;
$reader->download('http://www.egscomics.com/rss.php');

$parser = $reader->getParser();

if ($parser !== false) {

    $parser->grabber = true; // <= Enable the content grabber
    $feed = $parser->execute();
    // ...
}
```

When the content scraper is enabled, everything will be slower because for each item a new HTTP request is made and the HTML downloaded is parsed with XML/Xpath.

List of content grabber rules
-----------------------------

Rules are stored inside the directory [lib/PicoFeed/Rules](https://github.com/fguillot/picoFeed/tree/master/lib/PicoFeed/Rules)
