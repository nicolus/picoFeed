<?php
return array(
    'title' => '//h1[@id=\'query_h1\']',
    'test_url' => 'http://www.wired.com/cloudline/2011/10/meet-arms-cortex-a15-the-future-of-the-ipad-and-possibly-the-macbook-air/',
    'body' => array(
         '//div[contains(@class, \'lunatext results_content\')]',
    ),
    'strip_id_or_class' => array(
         'spl_unshd',
    ),
);
