<?php
return array(
    'test_url' => 'http://www.cicero.de/weltbuehne/ihre-wut-ist-global-krise-jugend-revolten-aufstaende-zelte/43049',
    'single_page_link' => array(
         '//a[@class=\"print\"]',
    ),
    'body' => array(
         '//div[@class=\'artikel-content\']',
    ),
    'strip' => array(
         '//div[@class=\'issue\']',
         '//div[@class=\'artikel-content\']/h2',
         '//div[@class=\'meta\']',
         '//div[@id=\'comments\']',
         '//p[text()=\"[SEITE]\"]',
    ),
    'strip_id_or_class' => array(
         'author',
         'field-name-field-image-credit',
         'field-name-field-article-image-subtitle',
    ),
);
