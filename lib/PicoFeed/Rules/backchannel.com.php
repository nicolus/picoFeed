<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'https://medium.com/lessons-learned/917b8b63ae3e',
            'body' => [
                '//div[contains(@class,"section-inner")]',
            ],
            'strip' => [
                '//div[contains(@class,"metabar")]',
                '//img[contains(@class,"thumbnail")]',
                '//h1',
                '//blockquote',
                '//p[contains(@class,"graf-after--h4")]'
            ],
        ],
    ],
];
