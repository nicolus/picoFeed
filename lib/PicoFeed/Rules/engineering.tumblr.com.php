<?php
return array(
    'title' => '//h2',
    'test_url' => 'http://engineering.tumblr.com/post/21276808338/tumblr-firehose',
    'body' => array(
         '//div[@class=\"post_content\"]',
    ),
    'strip' => array(
         '//h2',
         '//header',
    ),
);
