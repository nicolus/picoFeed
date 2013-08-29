<?php
return array(
    'title' => '//h1[@id = \'articleTitle\']',
    'test_url' => 'http://www.smithsonianmag.com/history-archaeology/The-Goddess-Goes-Home.html',
    'body' => array(
         '//div[@id = \'article-body\']',
    ),
    'single_page_link' => array(
         '//td/li[@class = \'article-singlepage\']/a',
    ),
    'strip' => array(
         '//p[@id = \'articlePaginationWrapper\']',
         '//ul[contains(@class, \'cat-breadcrumb\')]',
         '//div [@class= \'viewMorePhotos\']',
    ),
);
