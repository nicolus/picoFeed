<?php
return array(
    'test_url' => 'http://www.cjr.org/behind_the_news/from_breaking_news_to_baseless.php',
    'body' => array(
         '//p[@class=\'subhead\' or @class=\'attribution\'] | //div[@class=\'article-body\']',
    ),
    'single_page_link' => array(
         '//li[@class=\'print\']/a',
    ),
);
