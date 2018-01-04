PicoFeed
========

This is a fork of the original picoFeed (which has been abandonned).

This fork will strive to make picofeed as simple, fast and modern as possible by stripping out everything that's not purely directly related to parsing and creating feeds, and replacing them with third party components. Most notably, all HTTP requests are now handled by Guzzle, and caching will be optionally handled by Guzzle Middlewares.



Features
--------

- Simple and fast
- Feed parser for Atom 1.0 and RSS 0.91, 0.92, 1.0 and 2.0
- Feed writer for Atom 1.0 and RSS 2.0
- Favicon fetcher
- Import/Export OPML subscriptions
- Content filter: HTML cleanup, remove pixel trackers and Ads
- Multiple HTTP client adapters: cURL or Stream Context
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

Documentation
-------------

- [Installation](docs/installation.markdown)
- [Running unit tests](docs/tests.markdown)
- [Feed parsing](docs/feed-parsing.markdown)
- [Feed creation](docs/feed-creation.markdown)
- [Favicon fetcher](docs/favicon.markdown)
- [OPML](docs/opml.markdown)
- [Image proxy](docs/image-proxy.markdown) (avoid SSL mixed content warnings)
- [Web scraping](docs/grabber.markdown)
- [Exceptions](docs/exceptions.markdown)
- [Debugging](docs/debugging.markdown)
- [Configuration](docs/config.markdown)
