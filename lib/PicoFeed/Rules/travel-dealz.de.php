<?php
return [
    'grabber' => [
        '%^/blog.*%' => [
            'test_url' => 'http://travel-dealz.de/blog/venere-gutschein/',
            'body' => ['//div[@class="post-entry"]'],
            'strip' => [
                '//*[@id="jp-relatedposts"]',
                '//*[@class="post-meta"]',
                '//*[@class="post-data"]',
                '//*[@id="author-meta"]',
            ],
        ],
    ],
];
