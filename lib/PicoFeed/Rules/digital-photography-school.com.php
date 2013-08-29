<?php
return array(
    'title' => '//div[@class=\'post-title\']/h1',
    'test_url' => 'http://www.digital-photography-school.com/10-ways-to-develop-yourself-photographically',
    'body' => array(
         '//div[@class=\'post-content\']',
    ),
    'strip' => array(
         '//div[@class=\'post-meta\']',
    ),
);
