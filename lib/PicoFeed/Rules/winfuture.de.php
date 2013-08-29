<?php
return array(
    'title' => '//h1/span',
    'test_url' => 'http://winfuture.de/news,69672.html',
    'body' => array(
         '//div[@id=\"news_content\"]',
    ),
    'strip' => array(
         '//div[@id=\"news_content\"]/a[1]',
    ),
);
