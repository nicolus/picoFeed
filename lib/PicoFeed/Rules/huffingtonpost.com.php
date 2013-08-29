<?php
return array(
    'test_url' => 'http://www.huffingtonpost.com/mitch-moxley/tracking-beijings-boom-th_b_1209828.html',
    'test_url' => 'http://www.huffingtonpost.com/2012/09/11/president-obama-iphone-throwdown_n_1873826.html',
    'body' => array(
         '//div[img[starts-with(@id, \'img_caption\')]] | //div[@class=\"big_photo\"] | //div[contains(@class, \'entry_body_text\')]',
    ),
    'strip' => array(
         '//footer',
         '//p[contains(., \'Related on HuffPost:\')]',
    ),
    'strip_id_or_class' => array(
         'ps-slideshow',
         'fs-slideshow',
         'contribute-story',
         'promo_holder',
    ),
);
