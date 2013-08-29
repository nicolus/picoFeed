<?php
return array(
    'title' => '/html/head/meta[@name=\'title\']/@content',
    'test_url' => 'http://www.stephenfry.com/2011/10/06/steve-jobs/',
    'body' => array(
         '//div[@class=\'entry-content\']',
    ),
    'single_page_link' => array(
         '//p[@class=\'pagination\']/a',
    ),
);
