<?php
return array(
    'title' => '//div[@class=\"editorial-content\"]/h3',
    'test_url' => 'http://www.americascup.com/en/Latest/News/2012/3/Coutts-and-Peyron-tell-transformative-tale-at-Global-Sports-Forum/',
    'body' => array(
         '//div[@class=\"hero-image\" or @class=\"editorial-content\"]',
    ),
    'strip' => array(
         '//ul[@class=\"hero-caption\"]',
    ),
    'strip_id_or_class' => array(
         'footer',
    ),
);
