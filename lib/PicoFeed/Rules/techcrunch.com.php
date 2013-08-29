<?php
return array(
    'title' => '//h1[@class=\"headline\"]',
    'title' => '//a[@class=\"sh2\"]',
    'test_url' => 'http://techcrunch.com/2011/10/18/apples-insanely-great-q1-2012/',
    'body' => array(
         '//div[contains(@class, \'media-container\') or contains(@class, \'body-copy\')]',
         '//div[@id=\"singlentry\"]',
    ),
    'strip_id_or_class' => array(
         'module-crunchbase',
    ),
);
