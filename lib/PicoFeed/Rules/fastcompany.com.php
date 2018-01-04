<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.fastcompany.com/3026712/fast-feed/elon-musk-an-apple-tesla-merger-is-very-unlikely',
            'body' => [
                '//article[contains(@class, "body prose")]',
            ],
            'strip' => [
            ],
        ],
    ],
];
