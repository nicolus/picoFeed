<?php
return [
    'grabber' => [
        '%.*%' => [
            'body' => [
                '//img[@id="strip"]',
                '//a/div[@id="nx"]/..',
            ],
            'strip' => [],
            'test_url' => 'http://oglaf.com/slodging/',
        ],
    ],
    'filter' => [
        '%.*%' => [
            '%alt="(.+)" title="(.+)" */>%' => '/><br/>$1<br/>$2<br/>',
            '%</a>%' => 'Next page</a>',
        ],
    ],
];
