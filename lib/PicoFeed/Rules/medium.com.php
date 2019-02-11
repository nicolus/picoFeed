<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'https://medium.com/lessons-learned/917b8b63ae3e',
            'body' => [
                '//div[@class="section-content"]',
            ],
            'strip' => [
                '//div[contains(@class,"metabar")]',
                '//img[contains(@class,"thumbnail")]',
                '//h1',
                '//blockquote',
                '//div[@class="aspectRatioPlaceholder-fill"]',
                '//footer'
            ],
        ],
    ],
];
