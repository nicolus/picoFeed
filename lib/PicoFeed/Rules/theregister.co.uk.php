<?php
return array(
    'title' => '//div[@id=\"article\"]/h2',
    'test_url' => 'http://www.theregister.co.uk/2013/03/19/review_sony_xperia_z_flagship_android_smartphone/',
    'single_page_link' => array(
         '//a[contains(@href, \'print.html\')]',
    ),
    'body' => array(
         '//div[@id=\"article\"]/div[@id=\"body\"]',
    ),
    'strip' => array(
         '//hr[@class=\"PageBreak\"]',
    ),
);
