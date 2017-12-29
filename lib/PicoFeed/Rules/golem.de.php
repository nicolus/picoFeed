<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.golem.de/news/breko-telekom-verzoegert-gezielt-den-vectoring-ausbau-1311-102974.html',
            'body' => [
                '//header[@class="cluster-header"]',
                '//header[@class="paged-cluster-header"]',
                '//div[@class="formatted"]',
            ],
            'next_page' => [
                '//a[@id="atoc_next"]'
            ],
            'strip' => [
                '//header[@class="cluster-header"]/a',
                '//header[@class="cluster-header"]/h1',
                '//div[@id="iqadtile4"]',
            ],
        ],
    ],
];
