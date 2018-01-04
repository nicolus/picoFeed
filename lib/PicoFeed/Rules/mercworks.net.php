<?php
return [
    'grabber' => [
        '%.*%' => [
            'body' => ['//div[@id="comic"]',
                '//div[contains(@class,"entry-content")]',
            ],
            'strip' => [],
            'test_url' => 'http://mercworks.net/comicland/healthy-choice/',
        ],
    ],
    'filter' => [
        '%.*%' => [
            '%title="(.+)" */>%' => '/><br/>$1',
        ],
    ],
];
