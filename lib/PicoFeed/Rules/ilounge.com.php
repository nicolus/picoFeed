<?php
return array(
    'title' => 'substring-before(//title, \'|\')',
    'test_url' => 'http://www.ilounge.com/index.php/reviews/entry/luxa2-alum-x-for-iphone-4-4s/?utm_source=twitterfeed&utm_medium=twitter',
    'body' => array(
         '//div[@id=\'instapaper_para1\']',
    ),
    'strip' => array(
         '//div[@class=\'reviewinfo\']',
    ),
);
