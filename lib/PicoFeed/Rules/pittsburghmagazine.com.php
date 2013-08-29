<?php
return array(
    'title' => '//title',
    'test_url' => 'http://www.pittsburghmagazine.com/Pittsburgh-Magazine/May-2012/Verde-Lights-the-Night/',
    'body' => array(
         '//div[@id=\'article-body\']',
    ),
    'strip' => array(
         '//div[@class=\'by-line\']',
         '//div[@id=\'article-body\']/h1',
    ),
);
