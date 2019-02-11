<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://satwcomic.com/day-at-the-beach',
            'body' => [
                '//div[@class="container"]/center/a/img',
                '//span[@itemprop="articleBody"]',
            ],
            'strip' => [],
        ],
    ],
];
