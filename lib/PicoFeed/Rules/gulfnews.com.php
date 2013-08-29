<?php
return array(
    'test_url' => 'http://gulfnews.com/news/gulf/uae/government/abu-dhabi-centre-offers-useful-information-1.811084',
    'body' => array(
         '//div[@class=\'wrapper_half\']//ul[@class=\'details\'] | //div[@class=\'wrapper_half\']//p[@class=\'synopsis\'] | //div[@class=\'wrapper_half\']//div[@class=\'image\'] | //div[@class=\'wrapper_half\']//div[@class=\'article\']',
    ),
    'strip' => array(
         '//div[@class=\'wrapper_half\']//ul[@class=\'details\']/li[position()>1]',
    ),
);
