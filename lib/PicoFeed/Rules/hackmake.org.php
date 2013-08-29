<?php
return array(
    'title' => '//article/header/h2',
    'test_url' => 'http://hackmake.org/2012/12/21/mindfulness-of-concentration',
    'body' => array(
         '//article/div[@id=\"post-wide\"]',
    ),
    'strip' => array(
         '/div[@id=\"comment\"]',
         '//footer',
    ),
);
