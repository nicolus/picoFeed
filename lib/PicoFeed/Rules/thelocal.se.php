<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'www.thelocal.se/20161219/this-swede-can-memorize-hundreds-of-numbers-in-only-five-minutes',
            'body' => [
                '//div[@id="article-photo"]',
                '//div[@id="article-description"]',
                '//div[@id="article-body"]',
            ],
            'strip' => [
                '//div[@id="article-info-middle"]',
            ]
        ]
    ]
];

