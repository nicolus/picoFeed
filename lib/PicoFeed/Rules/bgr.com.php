<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://bgr.com/2015/09/27/iphone-6s-waterproof-testing/',
            'body' => [
                '//img[contains(@class,"img")]',
                '//div[@class="text-column"]',
            ],
            'strip' => [
                '//strong',
            ],
        ],
    ],
];
