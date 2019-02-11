<?php
return [
    'grabber' => [
        '%.*%' => [
            'body' => ['//a[@class="comic"]/img'],
            'strip' => [],
            'test_url' => 'http://www.exocomics.com/379',
        ],
    ],
    'filter' => [
        '%.*%' => [
            '%title="(.+)" */>%' => '/><br/>$1',
        ],
    ],
];
