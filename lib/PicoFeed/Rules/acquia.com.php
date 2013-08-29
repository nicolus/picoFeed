<?php
return array(
    'title' => '//h1[@class=\"title\"]',
    'test_url' => 'https://www.acquia.com/blog/drupals-long-warmth-toward-third-party-code',
    'body' => array(
         '//div[@class=\"content-wrapper\"]',
    ),
    'strip' => array(
         '//div[@id=\"skip-link\"]',
         '//div[@id=\"region-content-3-3\"]',
         '//div[@id=\"section-footer\"]',
    ),
);
