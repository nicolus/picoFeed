<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'https://zoom.hu/2017/10/20/mar-nem-nyomoznak-a-vegrehajtok-botranyai-miatt',
            'body' => [
                '//div[@class="title-wrapper"]/h1',
                '//div[@class="entry-excerpt"]',
                '//div[@class="thumbnail-wrapper"]',
                '//div[@id="entry-content-id"]'
            ],
            'strip' => [
                '//div[@class="place first normal"]'
            ]
        ],
    ],
];
