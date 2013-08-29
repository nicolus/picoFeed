<?php
return array(
    'test_url' => 'http://martinfowler.com/bliki/DatabaseThaw.html',
    'body' => array(
         '//div[@id=\"main\"]',
    ),
    'strip_id_or_class' => array(
         'date',
         'tags',
         'tagLabel',
    ),
    'strip' => array(
         '//div[@id=\"main\"]/h1[1]',
    ),
);
