<?php
return array(
    'title' => '//div[contains(@class, \'post\')]//h1',
    'test_url' => 'http://www.lovetv.com.bz/2013/06/28/recently-discovered-ancient-maya-wooden-canoe-paddle-to-be-handed-over-to-archaeology/',
    'test_url' => 'http://www.lovetv.com.bz/feed/',
    'body' => array(
         '//div[contains(@class, \'post\')]',
    ),
    'strip' => array(
         '//hr',
    ),
    'strip_id_or_class' => array(
         'post-meta',
    ),
);
