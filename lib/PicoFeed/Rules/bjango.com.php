<?php
return array(
    'title' => '//h1[@class=\'articlehead\']',
    'test_url' => 'http://bjango.com/articles/actions/',
    'body' => array(
         '//div[@class=\'column\']',
    ),
    'strip' => array(
         '//h1',
         '//div[@class=\'help\']',
    ),
);
