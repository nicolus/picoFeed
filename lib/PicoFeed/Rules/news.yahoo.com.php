<?php
return array(
    'title' => '//meta[@property=\'og:title\']/@content',
    'title' => '//h1[@class=\'headline\']',
    'test_url' => 'http://news.yahoo.com/cold-la-nina-winter-forecast-west-coast-183535067.html',
    'body' => array(
         '//div[@id=\'mediaarticlelead\']//a[@class=\'media\'] | //div[contains(@class,\'yom-art-content\')]',
    ),
    'strip_id_or_class' => array(
         'action',
         'prefetch',
    ),
);
