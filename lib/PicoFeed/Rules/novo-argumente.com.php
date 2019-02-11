<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'https://www.novo-argumente.com/artikel/der_kampf_gegen_die_schlafkrankheit',
            'body' => [
                '//main/div/article',
            ],
            'strip' => [
                '//*[@class="artikel-datum"]',
                '//*[@class="artikel-titel"]',
                '//*[@class="artikel-autor"]',
            ],
        ],
    ],
];
