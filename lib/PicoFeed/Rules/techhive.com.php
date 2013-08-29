<?php
return array(
    'title' => '//div[@class=\'articleHead\']//h1',
    'test_url' => 'http://www.techhive.com/article/2010549/up-close-with-blackberry-10.html',
    'body' => array(
         '//div[@class=\"main\"]',
    ),
    'strip' => array(
         '//div[@class=\'blogLabel\']',
         '//div[@class=\"article-meta\"]',
         '//div[@class=\"author-info\"]',
         '//div[@class=\"department\"]',
         '//div[@class=\"cap-main\"]',
         '//div[@id=\"compare-lede\"]',
    ),
);
