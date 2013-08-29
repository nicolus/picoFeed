<?php
return array(
    'title' => '//h1[@class=\'content-headline\']',
    'test_url' => 'http://www.gq.com/news-politics/newsmakers/201203/terry-thompson-ohio-zoo-massacre-chris-heath-gq-february-2012',
    'next_page_link' => array(
         '//div[@class=\'pagination\']//span[@class=\'paginationNext\']/a',
    ),
    'strip_id_or_class' => array(
         'utility',
         'keywords',
         'pagination',
         'position2_content',
    ),
    'body' => array(
         '//div[@class=\'article\']',
    ),
);
