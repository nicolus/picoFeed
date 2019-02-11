<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://international.thenewslens.com/post/255032/',
            'body' => [
                '//div[@class="article-section"]',
            ],
            'strip' => [
                '//div[contains(@class,"ad-")]',
                '//div[@class="article-title-box"]',
                '//div[@class="function-box"]',
                '//p/span',
                '//aside',
                '//footer',
                '//div[@class="article-infoBot-box"]',
                '//div[contains(@class,"standard-container")]'
            ],
        ],
    ],
];
