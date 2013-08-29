<?php
return array(
    'title' => '//h1[@class=\"content-headline\"]',
    'test_url' => 'http://www.details.com/culture-trends/critical-eye/201108/best-new-designers-innovations',
    'body' => array(
         '//div[@class=\"headers-container\"] | //div[@class=\"content-container\"]',
    ),
    'single_page_link' => array(
         '//li[@class=\'utility-print\']/a',
    ),
);
