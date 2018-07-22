Debugging
=========

Logging
-------

PicoFeed can log the execution flow with a PSR-3 compliant logger (like Monolog), if a feed doesn't work correctly it's easy to see what is wrong.

### Enable/disable logging

The logging is **disabled by default**.

To enable logging, set a logger with the setLogger static method, for example :

```php
$log = new \Monolog\Logger('log');
$handler = new Monolog\Handler\StreamHandler('debug.log', \Monolog\Logger::DEBUG);
$log->pushHandler($handler);

Logger::setLogger($log);
```

Note that most frameworks will already come with a PSR-3 logger, so you just have to pass the instance of your existing logger, don't create a new one. For example with Laravel :

```php
Logger::setLogger(Log::getMonolog())
```

Command line utility
====================

PicoFeed provides a basic command line tool to debug feeds quickly.
The tool is located in the root directory project.

### Usage

```bash
$ ./picofeed
Usage:
./picofeed feed <feed-url>                   # Parse a feed a dump the ouput on stdout
./picofeed debug <feed-url>                  # Display all logging messages for a feed
./picofeed item <feed-url> <item-id>         # Fetch only one item
./picofeed nofilter <feed-url> <item-id>     # Fetch an item but with no content filtering
```

### Example

```bash
$ ./picofeed debug https://linuxfr.org/
Exception thrown ===> "Invalid SSL certificate"
Array
(
    [0] => [2014-11-08 14:04:14] PicoFeed\Client\Curl Fetch URL: https://linuxfr.org/
    [1] => [2014-11-08 14:04:14] PicoFeed\Client\Curl Etag provided:
    [2] => [2014-11-08 14:04:14] PicoFeed\Client\Curl Last-Modified provided:
    [3] => [2014-11-08 14:04:16] PicoFeed\Client\Curl cURL total time: 1.850634
    [4] => [2014-11-08 14:04:16] PicoFeed\Client\Curl cURL dns lookup time: 0.00093
    [5] => [2014-11-08 14:04:16] PicoFeed\Client\Curl cURL connect time: 0.115213
    [6] => [2014-11-08 14:04:16] PicoFeed\Client\Curl cURL speed download: 0
    [7] => [2014-11-08 14:04:16] PicoFeed\Client\Curl cURL effective url: https://linuxfr.org/
    [8] => [2014-11-08 14:04:16] PicoFeed\Client\Curl cURL error: SSL certificate problem: Invalid certificate chain
)
```
