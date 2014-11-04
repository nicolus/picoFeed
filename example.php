<?php

require 'vendor/autoload.php';

use PicoFeed\Reader;
use PicoFeed\Logging;


// Feed parsing

try {

    $reader = new Reader;
    $resource = $reader->download('https://linuxfr.org/news.atom');

    $parser = $reader->getParser(
        $resource->getUrl(),
        $resource->getContent(),
        $resource->getEncoding()
    );

    $feed = $parser->execute();

    echo $feed;
}
catch (Exception $e) {
    echo $e->getMessage().PHP_EOL;
    echo Logging::toString();
}
/*

// Feed discovery: return a list of feeds

try {

    $reader = new Reader;
    $resource = $reader->download('http://linuxfr.org/');

    print_r($reader->find($resource->getUrl(), $resource->getContent()));
}
catch (Exception $e) {
    echo $e->getMessage().PHP_EOL;
    echo Logging::toString();
}



// Feed discovery and parsing

try {

    $reader = new Reader;
    $resource = $reader->discover('http://linuxfr.org');

    $parser = $reader->getParser(
        $resource->getUrl(),
        $resource->getContent(),
        $resource->getEncoding()
    );

    $feed = $parser->execute();

    echo $feed;
}
catch (Exception $e) {
    echo $e->getMessage().PHP_EOL;
    echo Logging::toString();
}
*/