PicoFeed
========

PicoFeed was originally developed for [Miniflux](http://miniflux.net), a minimalist and open source news reader.

[![Build Status](https://travis-ci.org/miniflux/picoFeed.svg?branch=master)](https://travis-ci.org/miniflux/picoFeed)

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

- PHP >= 5.3
- libxml >= 2.7
- XML PHP extensions: DOM and SimpleXML
- cURL or Stream Context (`allow_url_fopen=On`)
- iconv extension

Authors
-------

- Original author: Frédéric Guillot
- Major Contributors:
    - [Bernhard Posselt](https://github.com/Raydiation)
    - [David Pennington](https://github.com/Xeoncross)
    - [Mathias Kresin](https://github.com/mkresin)

Real world usage
----------------

- [Miniflux](http://miniflux.net)
- [Owncloud News](https://github.com/owncloud/news)

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
