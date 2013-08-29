<?php
return array(
    'title' => '//div[@class=\'article_header\']/h1',
    'test_url' => 'http://conversaciones.nokia.com/2011/10/07/cinco-atajos-en-el-nokia-n8/',
    'body' => array(
         '//div[@class=\'article_header\']/p | //div[@class=\'article_body\']',
    ),
    'strip_id_or_class' => array(
         'share_this',
         'sociable',
    ),
);
