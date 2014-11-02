<?php

// Include this file if you don't want to use an autoloader

require __DIR__.'/Exception/Parser.php';
require __DIR__.'/Exception/Client.php';
require __DIR__.'/Exception/InvalidCertificate.php';
require __DIR__.'/Exception/InvalidUrl.php';
require __DIR__.'/Exception/MaxRedirect.php';
require __DIR__.'/Exception/MaxSize.php';
require __DIR__.'/Exception/Reader.php';

require __DIR__.'/Logging.php';
require __DIR__.'/Url.php';
require __DIR__.'/Config.php';
require __DIR__.'/Item.php';
require __DIR__.'/Feed.php';
require __DIR__.'/XmlParser.php';
require __DIR__.'/Encoding.php';
require __DIR__.'/Grabber.php';
require __DIR__.'/Reader.php';
require __DIR__.'/Import.php';
require __DIR__.'/Export.php';
require __DIR__.'/Favicon.php';

require __DIR__.'/Client.php';
require __DIR__.'/Client/Curl.php';
require __DIR__.'/Client/Stream.php';

require __DIR__.'/Filter.php';
require __DIR__.'/Filter/Attribute.php';
require __DIR__.'/Filter/Tag.php';
require __DIR__.'/Filter/Html.php';

require __DIR__.'/Writer.php';
require __DIR__.'/Writer/Rss20.php';
require __DIR__.'/Writer/Atom.php';

require __DIR__.'/Parser.php';
require __DIR__.'/Parser/Atom.php';
require __DIR__.'/Parser/Rss20.php';
require __DIR__.'/Parser/Rss10.php';
require __DIR__.'/Parser/Rss92.php';
require __DIR__.'/Parser/Rss91.php';
