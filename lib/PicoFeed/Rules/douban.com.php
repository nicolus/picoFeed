<?php
return array(
    'title' => '//div[@class=\'note-header\']/h1',
    'title' => '//div[@id=\'content\']/h1',
    'test_url' => 'http://www.douban.com/group/topic/31140104/',
    'body' => array(
         '//div[contains(@class, \'note\')]',
         '//div[contains(@class, \'topic-content\')]',
    ),
    'strip' => array(
         '//h3',
    ),
);
