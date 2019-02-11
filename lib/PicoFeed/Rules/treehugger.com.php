<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.treehugger.com/uncategorized/top-ten-posts-week-bunnies-2.html',
            'body' => [
                '//div[contains(@class, "promo-image")]',
                '//div[contains(@id, "entry-body")]',
            ],
            'strip' => [
            ],
        ],
    ],
];
