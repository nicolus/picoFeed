<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'https://www.pro-linux.de/news/1/25252/chrome-62-erschienen.html',
            'body' => [
                '//div[@id="news"]',
            ],
            'strip' => [
                '//h3[@class="topic"]',
                '//h2[@class="title"]',
                '//div[@class="picto"]',
            ],
        ],
    ],
];
