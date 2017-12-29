<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'https://888.hu/article-a-budapesti-szocik-nem-szeretik-a-videki-szocikat',
            'body' => [
                '//div[@id="cikkholder"]/h1',
                '//div[@class="maincontent8"]'
            ],
            'strip' => [
                '//div[@class="AdW"]',
                '//h1[@class="olvastadmar"]'
            ]
        ],
    ],
];
