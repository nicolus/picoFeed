<?php
return array(
    'title' => '//h1[@class=\"story-header\"]',
    'test_url' => 'http://www.bbc.co.uk/sport/0/football/23224017',
    'test_url' => 'http://www.bbc.co.uk/news/business-15060862',
    'test_url' => 'http://www.bbc.co.uk/news/world-asia-22056933',
    'body' => array(
         '//div[@class=\"story-body\"]',
         '//div[contains(@class, \"videoInStory\") or @id=\"meta-information\"]',
         '//div[contains(@class, \'hrecipe\')]//div[@id=\'subcolumn-1\']',
    ),
    'strip' => array(
         '//div[contains(@class, \"story-feature\")]',
         '//span[@class=\"story-date\"]',
         '//div[@class=\"warning\"]//p',
         '//div[@id=\'page-bookmark-links-head\']',
         '//object',
         '//div[contains(@class, \"bbccom_advert_placeholder\")]',
         '//div[contains(@class, \"embedded-hyper\")]',
         '//div[contains(@class, \'market-data\')]',
         '//a[contains(@class, \'hidden\')]',
         '//div[contains(@class, \'hypertabs\')]',
         '//div[contains(@class, \'related\')]',
         '//form[@id=\'comment-form\']',
         '//div[contains(@class, \'comment-introduction\')]',
         '//div[contains(@class, \'share-tools\')]',
         '//div[@id=\'also-related-links\']',
    ),
);
