<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'https://www.gamestar.hu/hir/horizon-zero-dawn-the-frozen-wilds-vedjegy-239019.html',
            'body' => [
                '//article/header/h1',
                '//div[@class="section section-2-3"]/div[@class="image"]/img',
                '//article/p[@class="lead"]',
                '//article/div[@class="content"]'
            ],
            'strip' => [
                '//div[@class="ad ad-article-inside"]'
            ]
        ],
    ],
];
