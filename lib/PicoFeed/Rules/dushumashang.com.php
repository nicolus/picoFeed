<?php
return array(
    'title' => '//h2',
    'test_url' => 'http://www.dushumashang.com/2355',
    'body' => array(
         '//div[@class=\'main_content\']',
    ),
    'strip' => array(
         '//span[@class=\'article_author\']',
         '//span[@class=\'pub_date\']',
         '//div[@class=\'page_turn\']',
         '//span[@class=\'source_link\']/em',
    ),
);
