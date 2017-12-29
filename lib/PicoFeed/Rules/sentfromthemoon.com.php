<?php
return [
    'grabber' => [
        '%.*%' => [
            'body' => [
                '//div[@class="comicpane"]/a/img',
                '//div[@class="entry"]',
            ],
            'strip' => [],
            'test_url' => 'http://sentfromthemoon.com/archives/1417',
        ],
    ],
    'filter' => [
        '%.*%' => [
            '%title="(.+)" */>%' => '/><br/>$1',
        ],
    ],
];
