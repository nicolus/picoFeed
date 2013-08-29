<?php
return array(
    'title' => '//h1/a[2]',
    'test_url' => 'http://www.newswise.com/articles/first-heat-wave-of-season-puts-elderly-at-risk',
    'body' => array(
         '//div[@id=\"main\"]',
    ),
    'strip' => array(
         '//div[@class=\"inst-logo\"]',
         '//h1[1]',
    ),
    'strip_id_or_class' => array(
         'addthis',
         'released',
         'skiptranslate',
         'flash',
    ),
);
