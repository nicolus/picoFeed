<?php
return array(
    'title' => '//div[@class=\"post\"]/h2',
    'test_url' => 'http://ux.artu.tv/?p=192',
    'body' => array(
         '//div[@class=\"entry\"]',
    ),
    'strip' => array(
         '//div[@class=\"entry\"]/p[2]/a/img',
    ),
);
