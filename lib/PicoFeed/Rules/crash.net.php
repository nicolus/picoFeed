<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.crash.net/motogp/news/885102/1/dovizioso-mugello-win-was-catalyst-for-title-challenge',
            'body' => [
                '//*[@id="block-system-main"]',
            ],
            'strip' => [
                '//script',
                '//style',
                '//*[@class="social-bar"]',
                '//*[@id="below-headline-image-ad"]',
                '//*[@class="advert-"]',
            ],
        ],
    ],
];
