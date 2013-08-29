<?php
return array(
    'title' => '//meta[@property=\'og:title\']/@content',
    'test_url' => 'https://elisehahn.wordpress.com/2011/11/10/the-vatican-and-st-peters-basilica/',
    'body' => array(
         '//div[@id=\"content\"]//div[contains(@class, \'entry-content\') or contains(@class, \'entrytext\') or @class=\'main\' or @class=\'entry\']',
         '//div[@id=\'content\']',
    ),
    'strip' => array(
         '//nav',
         '//header',
         '//*[@id=\'comments\' or @id=\'respond\']',
         '//div[contains(@class, \'comments\')]',
         '//div[contains(@class, \'navigation\')]',
    ),
    'strip_id_or_class' => array(
         'sharedaddy',
         'wpadvert',
         'commentlist',
         'sociable',
         'related_post',
         'wp-socializer',
         'addtoany',
    ),
);
