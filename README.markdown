PicoFeed - PHP Library to manage Feeds
======================================

PicoFeed was originally developed for [Miniflux](http://miniflux.net), a minimalist and open source news reader.

However, this library can be used inside any project.
PicoFeed is tested with a lot of different feeds, it's simple and easy to use.

Features and requirements
-------------------------

- Simple and fast
- Dependencies: PHP >= 5.3, libxml >= 2.7, DOM, SimpleXML, cURL
- Feed parsers for Atom 1.0 and RSS (0.91, 0.92, 1.0 and 2.0)
- Feed writers for Atom 1.0 and RSS 2.0
- Import/Export OPML subscriptions
- Content filter: HTML cleanup, remove pixel trackers and Ads
- License: Unlicense <http://unlicense.org/>

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
