<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://www.time.com/time/specials/packages/article/0,28804,2094921_2094923_2094924,00.html',
    'single_page_link' => array(
         '//li[@class=\'print\']/a/@href',
    ),
    'strip' => array(
         '//span[@class=\"see\"]',
         '//div[@class=\"byline\"]',
         '//div[@id=\"date2\"]',
         '//h1',
    ),
);
