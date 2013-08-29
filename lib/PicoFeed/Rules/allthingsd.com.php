<?php
return array(
    'title' => '//div[@class=\"article-title\"]/h1[@class=\"title\"]',
    'test_url' => 'http://allthingsd.com/20120513/exclusive-yahoos-thompson-out-levinsohn-in-board-settlement-with-loeb-nears-completion/',
    'body' => array(
         '//*[@class=\"article-body article-text\"]',
    ),
    'strip' => array(
         '//blockquote[@class=\"memo\"]',
    ),
);
