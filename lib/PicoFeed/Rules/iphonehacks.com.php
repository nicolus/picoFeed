<?php
return array(
    'title' => '//meta[@name=\'og:title\']/@content',
    'test_url' => 'http://www.iphonehacks.com/2012/07/app-review-process-behind-the-scenes.html',
    'body' => array(
         '//small[@class=\'postmetadata\'] | //div[contains(@class, \'entry-content\')]',
    ),
    'strip' => array(
         '//span[@vanilla-identifier]',
    ),
);
