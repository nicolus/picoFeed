<?php
return [
    'grabber' => [
        '%.*%' => [
            'body' => [
                '//img[@id="comic_image"]',
                '//div[@class="comment-wrapper"][position()=1]',
            ],
            'strip' => [],
            'test_url' => 'http://www.anythingcomic.com/comics/2108929/stress-free/',
        ],
    ],
];
