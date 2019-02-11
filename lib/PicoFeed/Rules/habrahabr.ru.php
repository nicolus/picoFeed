<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'https://habrahabr.ru/company/pentestit/blog/328606/',
            'body' => [
                "//div[contains(concat(' ',normalize-space(@class),' '),' content ')]"
            ],
            'strip' => [],
        ],
    ],
];
