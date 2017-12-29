<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://smallhousebliss.com/2013/08/29/house-g-by-lode-architecture/',
            'body' => [
                '//div[@class="post-content"]',
            ],
            'strip' => [
                '//*[contains(@class, "gallery")]',
                '//*[contains(@class, "share")]',
                '//*[contains(@class, "wpcnt")]',
                '//*[contains(@class, "meta")]',
                '//*[contains(@class, "postitle")]',
                '//*[@id="nav-below"]',
            ],
        ],
    ],
];
