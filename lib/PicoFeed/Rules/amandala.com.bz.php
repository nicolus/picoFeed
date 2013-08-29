<?php
return array(
    'test_url' => 'http://amandala.com.bz/news/feed/',
    'test_url' => 'http://amandala.com.bz/news/poor-pse-results-30-raise/',
    'body' => array(
         '//div[@id=\'content\']//div[contains(@class, \'content\')]',
    ),
    'strip_id_or_class' => array(
         'widget',
    ),
    'strip' => array(
         '//a[contains(@href, \'upm_export=\')]',
    ),
);
