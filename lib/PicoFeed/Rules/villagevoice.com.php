<?php
return array(
    'title' => '//h2[@class=\'headline\']',
    'test_url' => 'http://www.villagevoice.com/2010-03-16/news/new-york-s-ten-worst-landlords/',
    'body' => array(
         '//div[@class=\'ContentPrint\']',
    ),
    'single_page_link' => array(
         '//a[contains(@href, \'/printVersion/\')]',
    ),
);
