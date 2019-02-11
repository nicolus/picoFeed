<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'https://www.nasa.gov/image-feature/jpl/pia20514/coy-dione',
            'body' => [
                '//div[@class="article-body"]',
            ],
            'strip' => [
                '//div[@class="title-bar"]',
            ],
        ],
    ],
];
