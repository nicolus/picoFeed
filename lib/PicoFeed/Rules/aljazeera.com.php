<?php
return array(
    'title' => '//span[@id=\'DetailedTitle\']',
    'test_url' => 'http://www.aljazeera.com/indepth/opinion/2012/01/2012114121925380575.html',
    'body' => array(
         '//td[@id=\'tdTextContent\']',
    ),
    'strip_id_or_class' => array(
         'Skyscrapper_Body',
    ),
    'strip' => array(
         '//table[ tbody/tr/td/object ]',
    ),
);
