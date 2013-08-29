<?php
return array(
    'title' => '//div[@id=\'main_text\']/h1',
    'test_url' => 'http://www.infoworld.com/d/the-industry-standard/it-jobs-the-rise-both-offshore-and-in-us-187689',
    'body' => array(
         '//div[@id=\'main_text\']',
    ),
    'strip' => array(
         '//div[@id=\'main_text\']/h1',
         '//div[@id=\'main_text\']/h2',
         '//div[@class=\'date\']',
    ),
    'strip_id_or_class' => array(
         'tools',
         'articleTools',
         'pagination',
         'byline',
         'tweet',
    ),
);
