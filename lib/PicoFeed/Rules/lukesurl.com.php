<?php
return [
    'grabber' => [
        '%.*%' => [
            'body' => ['//div[@id="comic"]//img'],
            'strip' => [],
            'test_url' => 'http://www.lukesurl.com/archives/comic/665-3-of-clubs',
        ],
    ],
    'filter' => [
        '%.*%' => [
            '%title="(.+)" */>%' => '/><br/>$1',
        ],
    ],
];
