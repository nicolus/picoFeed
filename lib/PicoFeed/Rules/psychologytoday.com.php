<?php
return array(
    'title' => '//div[@class=\"page-title\"]/h1',
    'test_url' => 'http://www.psychologytoday.com/blog/how-happiness/201205/my-quibble-facebook',
    'strip' => array(
         '//div[@class=\"page-title\"]/h1',
         '//div[@class=\"article-abstract\"]',
         '//div[@class=\"article-meta\"]',
         '//div[@id=\"rightColumn\"]',
         '//div[@id=\"inline-content-bottom-left\"]',
    ),
);
