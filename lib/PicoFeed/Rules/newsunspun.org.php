<?php
return array(
    'test_url' => 'http://www.newsunspun.org/eotn/bbc-headline-change-iran-goes-from-not-building-to-undecided-on-nuclear-bomb',
    'body' => array(
         '//div[@class=\'right\']//div[@class=\'articles\']',
    ),
    'strip' => array(
         '//div[@id=\'artinfo\']',
         '//table[//a[contains(@href, \'twitter.com\')]]',
    ),
    'strip_id_or_class' => array(
         'twitter',
    ),
);
