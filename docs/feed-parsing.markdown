Feed parsing
============

Download and parse a feed
-------------------------

```php
use PicoFeed\Reader;

$reader = new Reader;

// Try to discover the XML feed automatically
$reader->download('http://petitcodeur.fr/');

$parser = $reader->getParser();

if ($parser !== false) {

    $feed = $parser->execute();

    if ($feed !== false) {

        echo $feed->title;
        echo $feed->url;

        print_r($feed->items);
    }
}
```

- The method `getParser()` return `false` when there is something wrong during the download or the feed detection
- The call `$parser->execute()` return `false` when there is a parsing error

Handle HTTP cache
-----------------

To avoid downloading and parsing the feed each time, it's a good idea to handle the HTTP caching:

1. After the first HTTP request, we save somewhere (in a database) the headers Etag and Last-Modified for the next checks
2. If the feed is not modified, we don't need to parse again the feed

Example:

```php
use PicoFeed\Reader;

$reader = new Reader;

// Get last modified infos from previous requests
$lastModified = '...';
$etag = '...';

// Download directly the feed
$resource = $reader->download('http://petitcodeur.fr/feed.xml', $lastModified, $etag);

// Return true is the feed has changed
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
```

Use a custom user agent
-----------------------

You have to define a custom configuration for that:

```php
use PicoFeed\Reader;
use PicoFeed\Config;

$config = new Config;
$config->setClientUserAgent('My RSS Reader');

$reader = new Reader($config);
...
```

The complete config parameters are [described here](config.markdown).

Set a custom timezone
---------------------

By default, the timezone used is UTC but you can define a custom timezone for the logging and item parsing.

```php
use PicoFeed\Reader;
use PicoFeed\Config;

$config = new Config;
$config->setTimezone('Europe/Paris');

$reader = new Reader($config);
...
```
[List of supported TimeZones](http://php.net/manual/en/timezones.php)
