<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'https://kiszamolo.hu/30-eve-volt-a-fekete-hetfo/',
            'body' => [
                '//article/h2',
                '//article/div[@class="entry clearfix"]/p'
            ],
            'strip' => [
            ]
        ],
    ],
];
