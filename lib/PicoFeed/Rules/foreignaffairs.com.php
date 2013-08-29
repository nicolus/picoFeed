<?php
return array(
    'title' => '//h1[@class=\"title\"]',
    'test_url' => 'http://www.foreignaffairs.com/articles/138810/pierre-n-leval/the-long-arm-of-international-law',
    'single_page_link' => array(
         '//div[@class=\'showlinks\']/a',
    ),
    'body' => array(
         '//div[contains(@class,\"content-resize\")]',
    ),
    'strip' => array(
         '//div[@class=\"article-sidebar\"]',
         '//div[@class=\"showlinks\"]',
         '//div[contains(@class,\"premium-box\")]',
         '//div[contains(@class,\"premium-box\")]',
         '//table[contains(@border,\"2\")]',
    ),
);
