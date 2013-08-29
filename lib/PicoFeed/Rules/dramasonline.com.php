<?php
return array(
    'test_url' => 'http://www.dramasonline.com/jago-pakistan-jago-7th-december-2012-ali-gul-pir/',
    'body' => array(
         '//div[@class=\'postext\']',
    ),
    'strip_id_or_class' => array(
         'ratingblock',
         'hreview-aggregate',
    ),
    'strip' => array(
         '//div[contains(@style, \'display: none;\')]',
    ),
);
