<?php
return array(
    'title' => '//h1[@class=\'headline\']',
    'title' => '//h2[@itemprop=\'alternativeHeadline\']',
    'title' => '//h1[@itemprop=\'headline\']',
    'test_url' => 'http://www.hardware.no/artikler/asus-vg248qe/132792',
    'body' => array(
         '//div[@itemprop=\'reviewBody\']',
    ),
    'next_page_link' => array(
         '//a[@rel=\'next\']',
    ),
    'strip_id_or_class' => array(
         '\'product-box\'',
    ),
    'strip' => array(
         '//a[@rel=\'next\']',
         '//a[text()=\'Del på Facebook\']',
         '//a[text()=\'Del på Twitter\']',
    ),
);
