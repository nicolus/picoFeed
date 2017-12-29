<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://techcrunch.com/2013/08/31/indias-visa-maze/',
            'body' => [
                '//div[contains(@class, "media-container")]',
                '//div[contains(@class, "article-entry")]',
            ],
            'strip' => [
                '//*[contains(@class, "module-crunchbase")]',
            ],
        ],
    ],
];
