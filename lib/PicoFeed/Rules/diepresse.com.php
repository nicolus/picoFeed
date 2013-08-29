<?php
return array(
    'title' => '//div[@class=\'article\']/h1',
    'test_url' => 'http://diepresse.com/home/politik/aussenpolitik/701905/TibeterProteste_Nonne-verbrennt-sich-selbst?_vl_backlink=/home/politik/index.do',
    'body' => array(
         '//div[@id=\'articletext\']',
    ),
    'strip' => array(
         '//div[@class=\'inlineDiashow\']',
    ),
);
