<?php
return array(
    'title' => '//meta[@property=\'og:title\']/@content',
    'test_url' => 'http://www.information.dk/282307',
    'body' => array(
         '//div[@id=\'page-content\']//div[contains(@class, \'article-body\')]',
    ),
);
