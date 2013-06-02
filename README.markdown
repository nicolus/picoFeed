PicoFeed - PHP Library to manage Feeds
======================================

Features
--------

- No dependency (use only SimpleXML/Dom)
- Simple and fast
- Supported formats: Atom and RSS (0.91, 0.92, 1.0 and 2.0)
- Writer and reader
- Import/Export OPML subscriptions
- Filter: HTML cleanup, remove pixel trackers, Feedburner Ads
- License: Unlicense <http://unlicense.org/>

Todo
----

- Feed writer

Limitations
-----------

- OPML import/export don't support categories
- There is some hacks for **libxml2 version 2.6.32** (Debian Lenny) but **it's not supported** (please upgrade)

Usage
-----

### Import OPML file

    require 'vendor/PicoFeed/Import.php';

    $opml = file_get_contents('mySubscriptions.opml');
    $import = new Import($opml);
    $entries = $import->execute();

    print_r($entries);

### Export to OPML

    require 'vendor/PicoFeed/Export.php';

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

    $reader->download('http://petitcodeur.fr/', 'last modified date', 'etag value',  10, 'My RSS reader');
