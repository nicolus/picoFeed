<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.lesnumeriques.com/blender/kitchenaid-diamond-5ksb1585-p27473/test.html',
            'body' => [
                '//*[@id="product-content"]',
                '//*[@id="news-content"]',
                '//*[@id="article-content"]',
            ],
            'strip' => [
                '//form',
                '//h1',
                '//div[contains(@class, "price-v4"])',
                '//div[contains(@class, "authors-and-date")]',
                '//div[contains(@class, "mini-product")]',
                '//div[contains(@class, "social-share-text")]',
                '//div[contains(@class, "publication-breadcrumbs")]',
                '//div[@id="articles-related-authors"]',
                '//div[@id="tags-socials"]',
                '//div[@id="user-reviews"]',
                '//div[@id="product-reviews"]',
                '//div[@id="publication-breadcrumbs-and-date"]',
            ],
        ],
    ],
];
