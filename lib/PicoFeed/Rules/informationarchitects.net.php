<?php
return array(
    'title' => '//h1[@class=\"post_title\"]',
    'test_url' => 'http://informationarchitects.net/blog/nzz-relaunch-a-quick-review/',
    'body' => array(
         '//article[@class=\"post\"]',
    ),
    'strip' => array(
         '//nav[@class=\"arrow_nav\"]',
         '//section[@id=\"contact\"]',
    ),
    'strip_id_or_class' => array(
         'post_title',
         'post_author',
         'section_separator',
    ),
);
