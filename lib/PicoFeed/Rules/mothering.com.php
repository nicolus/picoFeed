<?php
return array(
    'title' => '//h2[contains(@class,\'post_headline\')]',
    'test_url' => 'http://mothering.com/all-things-mothering/inspiration/motherhood-brings-me-down',
    'body' => array(
         '//div[@class=\'entry\']',
    ),
    'strip_id_or_class' => array(
         'addthis_',
    ),
    'strip' => array(
         '//a[contains(@href,\'feedburner.com\')]',
    ),
);
