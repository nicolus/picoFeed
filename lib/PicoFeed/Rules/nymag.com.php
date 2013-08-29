<?php
return array(
    'title' => '//h2[contains(@class, \'primary\')]',
    'test_url' => 'http://nymag.com/news/features/wall-street-2012-2/',
    'body' => array(
         '//div[@id=\'story\']',
    ),
    'next_page_link' => array(
         '//div[@class=\'page-navigation\']//li[@class=\'next\']/a',
    ),
);
