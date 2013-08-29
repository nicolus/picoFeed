<?php
return array(
    'title' => '//h1[@id=\'articlehed\'] | //h2[@id=\"articleintro\"]',
    'test_url' => 'http://www.newyorker.com/online/blogs/culture/2012/06/mug-shot-web-sites.html',
    'test_url' => 'http://www.newyorker.com/reporting/2013/04/22/130422fa_fact_bilger?currentPage=all&mobify=0',
    'body' => array(
         '//div[@id=\'articletext\']',
    ),
    'strip' => array(
         '//ul[@id=\"bc\"] | //div[@id=\"yrail\"] | //div[@class=\"entry-keywords\"] | //div[@class=\"entry-categories\"] | //div[@class=\"socialUtils\"] | //div[@id=\"footer\"] | //div[@class=\"cartoon\"]',
    ),
    'single_page_link' => array(
         '//div[@class=\'paginationViewSinglePage\']/a',
    ),
);
