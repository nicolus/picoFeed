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
- License: Unlicense <http://unlicense.org/>

Requirements
------------

- PHP >= 5.3
- libxml >= 2.7
- XML PHP extensions: DOM and SimpleXML
- cURL or Stream Context (`allow_url_fopen=On`)

Limitations
-----------

- OPML import/export don't support categories (TODO)
- There is some hacks for **libxml2 version 2.6.32** (Debian Lenny) but **it's not supported** (please upgrade)

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

    print_r(PicoFeed\Logging::$logs);

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
