<?php
return array(
    'title' => '//div[@id=\'story\']//h2[@class=\'title\']',
    'test_url' => 'http://arstechnica.com/tech-policy/news/2012/02/gigabit-internet-for-80-the-unlikely-success-of-californias-sonicnet.ars',
    'test_url' => 'http://arstechnica.com/apple/2005/04/macosx-10-4/',
    'body' => array(
         '//div[contains(@class,\'article-content\')]',
    ),
    'strip' => array(
         '//h2[@class=\'title\']',
         '//div[@class=\'pager\']',
    ),
    'strip_id_or_class' => array(
         'byline',
    ),
    'next_page_link' => array(
         '//nav//a[span/@class=\'next\']/@href',
    ),
);
