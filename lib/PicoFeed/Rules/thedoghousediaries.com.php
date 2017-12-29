<?php
return [
    'grabber' => [
        '%.*%' => [
            'body' => [
                '//div[@class="comicpane"]/a/img',
                '//div[@class="entry"]',
            ],
            'strip' => [],
            'test_url' => 'http://thedoghousediaries.com/6023',
        ],
    ],
    'filter' => [
        '%.*%' => [
            '%title="(.+)" */>%' => '/><br/>$1',
        ],
    ],
];
