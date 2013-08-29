<?php
return array(
    'title' => 'concat(//div[@class=\'doc_author\'], \' - \', upper-case(//div[@class=\'doc_title\']))',
    'test_url' => 'http://www.es.hu/2010-12-08_vissza-a-partpenzt',
    'body' => array(
         '//div[@class=\'doc\']',
    ),
    'strip' => array(
         '//a[contains(@href, \'www.facebook.com/pages/Elet-es-Irodalom/\')]',
    ),
);
