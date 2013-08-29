<?php
return array(
    'test_url' => 'http://www.dn.se/nyheter/varlden/landade-flygplan-mitt-i-villaomrade',
    'body' => array(
         '//div[@id=\"article-content\"]',
    ),
    'strip_id_or_class' => array(
         'advert-space',
         'fbc-recommend',
         'recommend',
         'article-readers',
         'article-addons',
         'hook',
         'right',
         'footer',
    ),
    'strip' => array(
         '//div[@id=\"mirrors\"]',
    ),
);
