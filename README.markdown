PicoFeed - PHP Library to manage Atom and RSS Feeds
========
[![Latest Stable Version](https://poser.pugx.org/nicolus/picofeed/v/stable)](https://packagist.org/packages/nicolus/picofeed)
[![Total Downloads](https://poser.pugx.org/nicolus/picofeed/downloads)](https://packagist.org/packages/nicolus/picofeed)
[![Coverage Status](https://coveralls.io/repos/github/nicolus/picoFeed/badge.svg)](https://coveralls.io/github/nicolus/picoFeed) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/d76c5af7-a39c-46e9-9657-8a23046f17e7/mini.png)](https://insight.sensiolabs.com/projects/d76c5af7-a39c-46e9-9657-8a23046f17e7)

This is a fork of the original picoFeed (which has been abandoned).

This fork will strive to make picofeed as simple, fast and modern as possible by stripping out everything that's not purely directly related to parsing and creating feeds, and replacing them with third party components. Most notably, all HTTP requests are now handled by Guzzle, logging is optionally handled by Monolog, and caching will be optionally handled by Guzzle Middlewares.


Features
--------

- Simple and fast
- Feed parser for Atom 1.0 and RSS 0.91, 0.92, 1.0 and 2.0
- Feed writer for Atom 1.0 and RSS 2.0
- Favicon fetcher
- Import/Export OPML subscriptions
- Content filter: HTML cleanup, remove pixel trackers and Ads
- Proxy support
- Content grabber: download from the original website the full content
- Enclosure detection
- RTL languages support
- License: MIT

Requirements
------------

- PHP >= 7.1
- libxml >= 2.7
- XML PHP extensions: DOM and SimpleXML
- cURL or Stream Context (`allow_url_fopen=On`)
- iconv extension


Installation
--------

### Versions

- Development version: master
- Stable version: use the last tag

Install with [composer](https://getcomposer.org/doc/00-intro.md)

```bash
composer require nicolus/picofeed @stable
```

Usage example with the Composer autoloader:

```php
<?php

require 'vendor/autoload.php';

use PicoFeed\Reader\Reader;

$reader = new Reader;
$resource = $reader->download('http://linuxfr.org/news.atom');

$parser = $reader->getParser(
    $resource->getUrl(),
    $resource->getContent(),
    $resource->getEncoding()
);

$feed = $parser->execute();

echo $feed;
```

Documentation
-------------
- [Feed parsing](docs/feed-parsing.markdown)
- [Feed creation](docs/feed-creation.markdown)
- [Favicon fetcher](docs/favicon.markdown)
- [OPML](docs/opml.markdown)
- [Image proxy](docs/image-proxy.markdown) (avoid SSL mixed content warnings)
- [Web scraping](docs/grabber.markdown)
- [Exceptions](docs/exceptions.markdown)
- [Debugging](docs/debugging.markdown)
- [Configuration](docs/config.markdown)
- [Running unit tests](docs/tests.markdown)
