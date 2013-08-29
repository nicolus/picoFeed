<?php
return array(
    'title' => '//div[@id=\'main-article-info\']//h1',
    'test_url' => 'http://www.guardian.co.uk/business/2011/oct/06/quantitative-easing-75bn-bank-of-england',
    'test_url' => 'http://www.guardian.co.uk/world/2013/jul/10/nsa-duckduckgo-gabriel-weinberg-prism',
    'body' => array(
         '//div[@id=\'article-wrapper\']',
    ),
    'strip' => array(
         '//div[contains(@class, \'email-subscription\')]',
    ),
);
