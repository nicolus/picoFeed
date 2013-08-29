<?php
return array(
    'title' => '//h1[@class=\"sl-art-head-dek\"]',
    'test_url' => 'http://www.slate.com/id/2274583/pagenum/all/',
    'test_url' => 'http://www.slate.com/id/2293116/',
    'body' => array(
         '//article//div[@class=\'sl-art-body\']/div[contains(@class, \'body\')]',
    ),
    'strip' => array(
         '//div[@class=\"department_kicker\"]',
         '//div[@id=\"insider_ad_wrapper\" or @id=\"insider_ad_inner\"]',
         '//div[@id=\"bottom_sponsored_links\"]',
         '//div[@class=\"sl-art-ad-midflex\"]',
    ),
    'single_page_link' => array(
         '//a[@class=\'sl-art-sinpage\']',
    ),
);
