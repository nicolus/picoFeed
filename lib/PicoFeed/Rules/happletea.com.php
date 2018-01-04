<?php
return [
    'grabber' => [
        '%.*%' => [
            'body' => [
                '//div[@id="comic"]',
                '//div[@class="entry"]',
            ],
            'strip' => ['//div[@class="ssba"]'],
            'test_url' => 'http://www.happletea.com/comic/mans-best-friend/',
        ],
    ],
    'filter' => [
        '%.*%' => [
            '%title="(.+)" */>%' => '/><br/>$1',
        ],
    ],
];
