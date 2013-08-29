<?php
return array(
    'title' => '//h2[contains(@class, \'name\')]',
    'test_url' => 'http://www.myrecipes.com/recipe/hummingbird-cake-10000000387218/',
    'body' => array(
         '//div[@class=\'printFullPageContentContainer\']//div[contains(@class, \'recipe\')]',
    ),
    'strip_id_or_class' => array(
         'photoBy',
         'link',
    ),
    'single_page_link' => array(
         '//li[@class=\'print\']/a[contains(@href, \'/print/\')]',
    ),
);
