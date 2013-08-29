<?php
return array(
    'title' => '//div[@class=\"blogpost\"]/h2',
    'test_url' => 'http://greatergreaterwashington.org/post/12457/ask-ggw-what-will-happen-to-the-1000-series-railcars/',
    'body' => array(
         '//div[@class=\"blogpost\"]',
    ),
    'strip_id_or_class' => array(
         'flag',
         'byline',
         'post_footer',
         'related_posts',
         'post_author_bios',
    ),
    'strip' => array(
         '//h2',
    ),
);
