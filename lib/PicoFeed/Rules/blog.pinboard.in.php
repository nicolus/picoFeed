<?php
return array(
    'title' => '//a[@class=\"blog_title\"]',
    'test_url' => 'http://blog.pinboard.in/2011/11/the_social_graph_is_neither/',
    'body' => array(
         '//div[@class=\"blog_entry\"]',
    ),
    'strip_id_or_class' => array(
         'blog_title',
         'when',
    ),
);
