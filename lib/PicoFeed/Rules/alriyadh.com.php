<?php
return array(
    'test_url' => 'http://www.alriyadh.com/2011/10/10/article674357.html',
    'test_url' => 'http://www.alriyadh.com/net/article/780935',
    'body' => array(
         '//div[@id = \"article-view\"]',
         '//div[contains(@class, \'article\')]//div[contains(@class, \'photo_bg\')]',
    ),
    'strip' => array(
         '//h1',
         '//h2',
    ),
    'strip_id_or_class' => array(
         'author',
    ),
);
