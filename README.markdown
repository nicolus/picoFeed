PicoFeed - PHP Library to manage Feeds
======================================

PicoFeed was originally developed for [Miniflux](http://miniflux.net), a minimalist and open source news reader.

However, this library can be used inside any project.
PicoFeed is tested with a lot of different feeds, it's simple and easy to use.

Features and requirements
-------------------------

- Simple and fast
- Feed parser for Atom 1.0 and RSS (0.91, 0.92, 1.0 and 2.0)
- Feed writer for Atom 1.0 and RSS 2.0
- Import/Export OPML subscriptions
- Content filter: HTML cleanup, remove pixel trackers and Ads
- Many HTTP client adapters: cURL or Stream Context
- Content grabber: download from the original website the full content
- License: Unlicense <http://unlicense.org/>

Requirements
------------

- PHP >= 5.3
- libxml >= 2.7
- XML PHP extensions: DOM and SimpleXML
- cURL or Stream Context (`allow_url_fopen=On`)

Usage
-----

### Import OPML file

    require 'vendor/PicoFeed/Import.php';

    use PicoFeed\Import;

    $opml = file_get_contents('mySubscriptions.opml');
    $import = new Import($opml);
    $entries = $import->execute();

    print_r($entries);

### Export to OPML

    require 'vendor/PicoFeed/Export.php';

    use PicoFeed\Export;

    $feeds = array(
        array(
            'title' => 'Site title',
            'description' => 'Optional description',
            'site_url' => 'http://petitcodeur.fr/',
            'site_feed' => 'http://petitcodeur.fr/feed.xml'
        )
    );

    $export = new Export($feeds);
    $opml = $export->execute();

    echo $opml; // XML content

### Download and parse a feed

    require 'vendor/PicoFeed/Reader.php';

    use PicoFeed\Reader;

    $reader = new Reader;

    // Try to discover the XML feed automatically
    $reader->download('http://petitcodeur.fr/');

    $parser = $reader->getParser();

    if ($parser !== false) {

        $feed = $parser->execute();

        echo $feed->title;
        echo $feed->url;
        print_r($feed->items);
    }

### Handle HTTP cache

    require 'vendor/PicoFeed/Reader.php';

    use PicoFeed\Reader;

    $reader = new Reader;

    // Get last modified infos from previous requests
    $lastModified = '...';
    $etag = '...';

    // Download directly the feed
    $resource = $reader->download('http://petitcodeur.fr/feed.xml', $lastModified, $etag);

    if ($resource->isModified()) {

        $parser = $reader->getParser();

        if ($parser !== false) {

            $feed = $parser->execute();

            echo $feed->title;
            echo $feed->url;
            print_r($feed->items);

            // Save cache infos for the next request
            $lastModified = $resource->getLastModified();
            $etag = $resource->getEtag();
        }
    }

### Modify the user-agent and connection timeout

    $reader->download(
        'http://petitcodeur.fr/',
        'last modified date',
        'etag value',
        10,
        'My RSS reader user agent'
    );

### Generate RSS 2.0 feed

    require_once 'lib/PicoFeed/Writers/Rss20.php';

    use PicoFeed\Writers\Rss20;

    $writer = new Rss20();
    $writer->title = 'My site';
    $writer->site_url = 'http://boo/';
    $writer->feed_url = 'http://boo/feed.atom';
    $writer->author = array(
        'name' => 'Me',
        'url' => 'http://me',
        'email' => 'me@here'
    );

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
        'author' => array(
            'name' => 'Me too',
        )
    );

    $writer->items[] = array(
        'title' => 'My article 3',
        'url' => 'http://foo/bar3'
    );

    echo $writer->execute();

### Generate Atom feed

    require_once 'lib/PicoFeed/Writers/Atom.php';

    use PicoFeed\Writers\Atom;

    $writer = new Atom();
    $writer->title = 'My site';
    $writer->site_url = 'http://boo/';
    $writer->feed_url = 'http://boo/feed.atom';
    $writer->author = array(
        'name' => 'Me',
        'url' => 'http://me',
        'email' => 'me@here'
    );

    $writer->items[] = array(
        'title' => 'My article 1',
        'updated' => strtotime('-2 days'),
        'url' => 'http://foo/bar',
        'summary' => 'Super summary',
        'content' => '<p>content</p>'
    );

    echo $writer->execute();

### Get log messages

You can got all debug output by calling this code:

    print_r(PicoFeed\Logging::$messages);

You will got an output like that:

    Array
    (
        [0] => Fetch URL: http://petitcodeur.fr/feed.xml
        [1] => Etag:
        [2] => Last-Modified:
        [3] => cURL total time: 0.711378
        [4] => cURL dns lookup time: 0.001064
        [5] => cURL connect time: 0.100733
        [6] => cURL speed download: 74825
        [7] => HTTP status code: 200
        [8] => HTTP headers: Set-Cookie => start=R2701971637; path=/; expires=Sat, 06-Jul-2013 05:16:33 GMT
        [9] => HTTP headers: Date => Sat, 06 Jul 2013 03:55:52 GMT
        [10] => HTTP headers: Content-Type => application/xml
        [11] => HTTP headers: Content-Length => 53229
        [12] => HTTP headers: Connection => close
        [13] => HTTP headers: Server => Apache
        [14] => HTTP headers: Last-Modified => Tue, 02 Jul 2013 03:26:02 GMT
        [15] => HTTP headers: ETag => "393e79c-cfed-4e07ee78b2680"
        [16] => HTTP headers: Accept-Ranges => bytes
    )

### Override blacklist/whitelist of the content filter

These variables are static arrays, extends the actual array or replace it.

By example to add a new iframe whitelist:

    Filter::$iframe_whitelist[] = 'http://www.kickstarter.com';

Or to replace the entire whitelist:

    Filter::$iframe_whitelist = array('http://www.kickstarter.com');

Available variables:

    // Allow only specified tags and attributes
    Filter::$whitelist_tags

    // Strip content of these tags
    Filter::$blacklist_tags

    // Allow only specified URI scheme
    Filter::$whitelist_scheme

    // List of attributes used for external resources: src and href
    Filter::$media_attributes

    // Blacklist of external resources
    Filter::$media_blacklist

    // Required attributes for tags, if the attribute is missing the tag is dropped
    Filter::$required_attributes

    // Add attribute to specified tags
    Filter::$add_attributes

    // Integer Attributes
    Filter::$integer_attributes

    // Iframe allowed source
    Filter::$iframe_whitelist

For more details, have a look to the class `Filter`.

### How the content grabber works?

1. Try with rules first (xpath patterns) for the domain name (see `PicoFeed\Rules\`)
2. Try to find the text content by using common attributes for class and id
3. Finally, if nothing is found, the feed content is displayed

The content downloader use a fake user agent, actually Google Chrome under Mac Os X.

**The best results are obtained with Xpath rules file.**

There is a PHP script inside PicoFeed to import Fivefilters rules, but I dont' use it because almost of these patterns are not up to date.

### How to write a grabber rules file?

Add a PHP file to the directory `PicoFeed\Rules`, the filename must be the domain name:

Example with the BBC website, `www.bbc.co.uk.php`:

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

Actually, only `body`, `strip` and `test_url` are supported.

Don't forget to send a pull request or a ticket to share your contribution with everybody,

### How to use the content scraper?

    require 'vendor/PicoFeed/Reader.php';

    use PicoFeed\Reader;

    $reader = new Reader;
    $reader->download('http://www.egscomics.com/rss.php');

    $parser = $reader->getParser();

    if ($parser !== false) {

        $parser->grabber = true; // <= Enable the content grabber
        $feed = $parser->execute();
        // ...
    }

When the content scraper is enabled, everything will be slower because for each item a new HTTP request is made and the HTML downloaded is parsed with XML/Xpath.

### List of content grabber rules

**If you want to add new rules, just open a ticket and I will do it.**

- *.blog.lemonde.fr
- *.blog.nytimes.com
- *.nytimes.com
- *.slate.com
- *.theguardian.com
- *.wikipedia.org
- *.wired.com
- *.wsj.com
- github.com
- lifehacker.com
- plus.google.com
- rue89.com
- smallhousebliss.com
- techcrunch.com
- www.bbc.co.uk
- www.businessweek.com
- www.cnn.com
- www.egscomics.com
- www.forbes.com
- www.lemonde.fr
- www.lepoint.fr
- www.npr.org
- www.numerama.com
- www.slate.fr