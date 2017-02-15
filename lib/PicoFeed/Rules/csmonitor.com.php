<?php

return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://www.csmonitor.com/USA/Politics/2015/0925/John-Boehner-steps-down-Self-sacrificing-but-will-it-lead-to-better-government',
            'body' => array(
            '//article',
            ),
            'strip' => array(
                '//h1',
                '//span[@id="breadcrumb"]',
                '//div[@id="head-tag"]',
                '//div[@id="byline"]',
                '//div[@id="right-column"]',
                '//div[@class="injection"]',
                '//div[@id="sticky-nav"]',
                '//div[@id="byline-wrapper"]',
                '//li[@class="video disabled"]',
                '//div[@id="image-nav"]',
                '//div[@class="header_group"]',
                '//div[contains(@class,"caption_bar")]',
                '//img[@title="hide caption"]',
                '//*[contains(@class,"promo_link")]',
                '//div[@id="story-embed-column"]',
                '//div[@class="story-foot"]'
            ),
        ),
    ),
);
