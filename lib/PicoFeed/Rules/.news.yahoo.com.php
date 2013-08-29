<?php
return array(
    'title' => '//h1[@class=\'headline\']',
    'test_url' => 'http://ca.news.yahoo.com/cold-la-nina-winter-forecast-west-coast-183535067.html',
    'body' => array(
         '//cite[contains(@class,\'byline\')] | //div[contains(@class,\'yom-art-content\')]',
    ),
    'strip' => array(
         '//cite/abbr',
    ),
);
