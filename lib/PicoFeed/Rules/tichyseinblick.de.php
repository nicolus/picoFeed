<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'https://www.tichyseinblick.de/daili-es-sentials/jamaika-reaktionen-der-enttaeuschten/',
            'body' => [
                '//article'
            ],
            'strip' => [
                '//header',
                '//footer',
                '//div[@class="mod-cad2"]',
                '//ul[contains(@class, "social")]',
                '//div[@class="rty-pop-up"]',
                '//div[@class="pagelink"]',
                '//div[@id="reward"]',
                '//div[@class="rty-block-plista"]'
            ]
        ],
    ],
];

