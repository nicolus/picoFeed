<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://retractionwatch.com/2015/11/12/psychologist-jens-forster-settles-case-by-agreeing-to-2-retractions/',
            'body' => [
                '//*[@class="main"]',
                '//*[@class="entry-content"]',
            ],
            'strip' => [
                '//*[contains(@class, "sharedaddy")]',
                '//*[contains(@class, "jp-relatedposts")]',
                '//p[@class="p1"]',
            ]
        ]
    ]
];

