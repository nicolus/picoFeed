<?php
return array(
    'title' => '//h1[@class=\"entry-title\"][2]',
    'test_url' => 'http://boagworld.com/working-in-web-design/dealing-with-the-dickheads/',
    'body' => array(
         '//article',
    ),
    'strip' => array(
         '//h2',
         '//h1',
         '//div[@id=\"callsToAction\"]',
    ),
);
