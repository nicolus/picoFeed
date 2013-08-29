<?php
return array(
    'title' => '//h1[@class=\'post-title\']',
    'test_url' => 'http://thepioneerwoman.com/cooking/2011/08/pie-fats-a-comparison/',
    'body' => array(
         '//div[@class=\'post\']',
    ),
    'strip' => array(
         '//div[@class=\'author_avatar\']',
         '//div[@class=\'sprite post-date\']',
         '//h1[@class=\'post-title\']',
         '//p[@class=\'posted-by\']',
    ),
);
