<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://www.guokr.com/article/275013/',
    'test_url' => 'http://www.guokr.com/article/338387/',
    'body' => array(
         '//div[contains(@class, \'Content\')]',
    ),
    'strip' => array(
         '//div[contains(@class, \'bottom-i\')]',
         '//div[contains(@class, \'copyright\')]',
         '//div[contains(@class, \'fr\')]',
         '//div[contains(@class, \'content-th-info\')]',
         '//h1[contains(@id, \'articleTitle\')]',
         '//div[contains(@class, \'side\')]',
         '//div[contains(@class, \'top-wp\')]',
    ),
);
