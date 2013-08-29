<?php
return array(
    'title' => '//div[contains(@class, \'post\')]//h1',
    'test_url' => 'http://www.sanpedrosun.com/community-and-society/2013/06/05/little-angelspre-school-talent-show/',
    'test_url' => 'http://www.sanpedrosun.com/feed/',
    'body' => array(
         '//div[contains(@class, \'entry\')]',
    ),
    'strip_id_or_class' => array(
         'post_stats',
         'related-posts',
         'after_story',
    ),
);
