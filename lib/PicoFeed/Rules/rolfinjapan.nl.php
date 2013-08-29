<?php
return array(
    'test_url' => 'http://www.rolfinjapan.nl/2011/06/duizend-kraanvogels/',
    'body' => array(
         '//div[contains(@class, \'inhoud\')]',
    ),
    'strip' => array(
         '//div[@class = \'grid_2\']',
         '//div[@class = \'block-citation-text\']',
    ),
);
