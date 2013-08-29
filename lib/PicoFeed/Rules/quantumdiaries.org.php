<?php
return array(
    'title' => '//div[contains(@class, \"hentry\")]/h3',
    'test_url' => 'http://www.quantumdiaries.org/2011/10/25/piling-up/',
    'body' => array(
         '//div[contains(@class, \"entry\")]',
    ),
    'strip_id_or_class' => array(
         'addtoany_share_save_container',
         'postmetadata',
         'author_bio',
         'author_bio_2',
    ),
    'strip' => array(
         '//div[contains(@class, \"hentry\")]/h3',
    ),
);
