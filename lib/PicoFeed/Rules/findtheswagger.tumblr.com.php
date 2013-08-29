<?php
return array(
    'test_url' => 'http://findtheswagger.tumblr.com/post/11589145141/moe-resners-end-of-an-era-1957-giants-final',
    'body' => array(
         '//div[@id=\'content\']',
    ),
    'strip_id_or_class' => array(
         'tags',
         'permalink',
         'notes',
         'post_nav',
         'right_column',
    ),
    'strip' => array(
         '//div[@id=\'content\']//h2',
    ),
);
