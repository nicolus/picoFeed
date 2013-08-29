<?php
return array(
    'title' => '//div[@class=\'articleHead\']//h1',
    'test_url' => 'http://www.pcworld.com/article/262034/are-printer-companies-gouging-us-on-laser-toner-pricing.html',
    'body' => array(
         '//div[@class=\"main\"]',
    ),
    'strip' => array(
         '//div[@class=\'blogLabel\']',
         '//h1',
         '//div[@class=\"article-meta\"]',
         '//div[@class=\"author-info\"]',
         '//div[@class=\"department\"]',
         '//div[@class=\"cap-main\"]',
         '//div[@id=\"compare-lede\"]',
    ),
);
