<?php
return array(
    'title' => '//h1[@class=\'print-title\']',
    'test_url' => 'http://moreintelligentlife.com/content/places/paul-markillie/they-trash-cars-dont-they',
    'body' => array(
         '//div[@class=\'print-submitted\' or @class=\'print-created\' or @class=\'print-content\']',
    ),
    'single_page_link' => array(
         '//li[@class=\'print\']/a',
    ),
);
