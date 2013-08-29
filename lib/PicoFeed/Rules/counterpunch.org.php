<?php
return array(
    'title' => '//div[@class=\'main\']//h1[contains(@class, \'article-title\')]',
    'test_url' => 'http://www.counterpunch.org/johnstone05172011.html',
    'body' => array(
         '//div[@class=\'main\']//div[@class=\'main-text\']',
    ),
    'strip' => array(
         '//td[@width=\'140\']',
    ),
);
