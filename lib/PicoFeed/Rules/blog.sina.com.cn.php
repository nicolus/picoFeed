<?php
return array(
    'title' => '//*[contains(@class,\'titName SG_txta\')]',
    'test_url' => 'http://blog.sina.com.cn/s/blog_5054769e0102dtja.html',
    'body' => array(
         '//div[contains(@class,\'articalContent\')]',
    ),
    'strip' => array(
         '//span[contains(@class,\'MASS\')]',
         '//div[contains(@class,\'allComm\')]',
         '//ins',
    ),
);
