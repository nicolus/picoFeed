<?php
return array(
    'title' => '//div[@class=\'post\']/h2',
    'test_url' => 'http://www.kingarthurflour.com/blog/2011/01/28/a-big-sandwich-for-the-big-game/',
    'body' => array(
         '//div[@class=\'entry\']',
    ),
    'strip' => array(
         '//p[contains(.,\'Tags:\')]',
    ),
);
