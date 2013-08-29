<?php
return array(
    'test_url' => 'http://www.cw.com.tw/article/article.action?id=5032848',
    'body' => array(
         '//div[contains(@class,\'mainContaner\')]',
    ),
    'strip' => array(
         '//div[contains(@class,\'mainHeaer\')]',
         '//div[contains(@class,\'keyW\')]',
         '//div[contains(@class,\'wonderful\')]',
         '//div[contains(@class,\'pages\')]',
         '//div[contains(@class,\'Topics TopicsW3\')]',
    ),
    'next_page_link' => array(
         '//li[@class=\'pageNext\']/a[contains(.,\'下一頁\')]',
    ),
);
