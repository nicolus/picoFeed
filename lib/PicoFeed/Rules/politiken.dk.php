<?php
return array(
    'title' => '//h1[contains(@class, \'stor-type\')]',
    'test_url' => 'http://politiken.dk/kultur/boger/skonlitteratur_boger/ECE1426386/makabre-tegneserie-zombier-aeder-alt-levende/',
    'body' => array(
         '//div[@id=\'art-body\']',
    ),
    'strip' => array(
         '//div[@class=\'art-fakta article-box\']',
    ),
);
