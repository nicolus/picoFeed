<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'https://github.com/audreyr/favicon-cheat-sheet',
            'body' => [
                '//article[contains(@class, "entry-content")]',
            ],
            'strip' => [
                '//h1',
            ],
        ],
    ],
];
