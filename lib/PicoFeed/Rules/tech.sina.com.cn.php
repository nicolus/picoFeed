<?php
return array(
    'title' => '//h1[contains(@id,\'artibodyTitle\')]',
    'test_url' => 'http://tech.sina.com.cn/mobile/n/2012-03-22/07476863046.shtml',
    'body' => array(
         '//div[contains(@id,\'artibody\')]',
    ),
    'strip' => array(
         '//div[contains(@class,\'otherContent\')]',
    ),
    'next_page_link' => array(
         '//p[@class=\'page\']/a[contains(.,\'下一页\')]',
    ),
);
