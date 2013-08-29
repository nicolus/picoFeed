<?php
return array(
    'title' => '//h1[@class=\'postTitle\']',
    'test_url' => 'http://www.unwinnable.com/2013/04/23/gratifying-play/',
    'body' => array(
         '//div[@class=\'postContent\']',
    ),
    'strip' => array(
         '//div[@class=\'simplePullQuote\']',
    ),
);
