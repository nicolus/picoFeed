<?php
return array(
    'title' => '//div[@id=\'article\']/div[@class=\'hd\']/h1',
    'test_url' => 'http://sports.yahoo.com/nba/news?slug=ap-nbafinals',
    'body' => array(
         '//p[@id=\'byline\'] | //div[@id=\'article\']//div[@class=\'body_copy 0\']',
    ),
    'strip' => array(
         '//div[@class=\'foot\']',
         '//div[@id=\'sidebar\']//div[@class=\'ft\']',
         '//p[@id=\'byline\']//em',
    ),
);
