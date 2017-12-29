<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.theatlantic.com/politics/archive/2015/09/what-does-it-mean-to-lament-the-poor-inside-panem/407317/',
            'body' => [
                '//picture[@class="img"]',
                '//figure/figcaption/span',
                '//div/p[@itemprop="description"]',
                '//div[@class="article-body"]',
                '//ul[@class="photos"]',
            ],
            'strip' => [
                '//aside[@class="callout"]',
                '//span[@class="credit"]',
                '//figcaption[@class="credit"]',
                '//aside[contains(@class,"partner-box")]',
                '//div[contains(@class,"ad")]',
                '//a[contains(@class,"social-icon")]',
            ],
        ],
    ],
];
