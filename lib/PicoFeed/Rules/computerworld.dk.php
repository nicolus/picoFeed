<?php
return array(
    'title' => '//div[@id=\'article\']/h1',
    'title' => '//div[contains(@class, \'article\')]/h1',
    'test_url' => 'http://www.computerworld.dk/art/56748/test-din-viden-med-computerworlds-store-sommerquiz?a=fp_1&i=0',
    'strip' => array(
         '//div[contains(@class, \'articleAdtechAd\')]',
    ),
    'body' => array(
         '//div[@id=\'articleText\']',
    ),
);
