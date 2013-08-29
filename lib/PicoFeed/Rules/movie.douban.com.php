<?php
return array(
    'title' => '//span[contains(@property, \'v:summary\')]',
    'test_url' => 'http://movie.douban.com/review/1062013/',
    'body' => array(
         '//div[contains(@class, \'note\')]|//div[contains(@class, \'topic-content\')]',
    ),
    'strip' => array(
         '//img[contains(@class,\'rating\')]|//img[contains(@class,\'review-stat\')]',
    ),
);
