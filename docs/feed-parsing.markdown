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

Modify the user-agent and connection timeout
--------------------------------------------

Here an example how to set a timeout of 10 seconds and a custom user agent:

```php
$reader->download(
    'http://petitcodeur.fr/',
    'last modified date',
    'etag value',
    10,
    'My RSS reader user agent'
);
```

HTTP proxy
----------

Just call the static method `proxy()` before everything else:

```php
PicoFeed\Client::proxy($hostname, $port);
```

If your proxy is protected by a login and a password:

```php
PicoFeed\Client::proxy($hostname, $port, $username, $password);
```
