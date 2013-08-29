<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://www.theatlanticcities.com/arts-and-lifestyle/2012/12/christmas-time-here/4133/',
    'body' => array(
         '//article[@class=\'post\']',
    ),
    'strip' => array(
         '//h1',
         '//ul[@class=\'meta\']',
         '//div[@class=\'newsletter-slug\']',
    ),
);
