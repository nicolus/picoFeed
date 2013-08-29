<?php
return array(
    'title' => '//article//h1',
    'test_url' => 'http://www.macworld.com/article/163184/2011/10/the_ipod_as_an_iconic_cultural_force.html',
    'body' => array(
         '//section[@class=\"page\"]',
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
