<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'https://geektimes.ru/post/289151/',
            'body' => [
                "//div[contains(concat(' ',normalize-space(@class),' '),' content ')]"
            ],
            'strip' => [],
        ],
    ],
];
