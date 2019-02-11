<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://coinwelt.de/2017/08/bitcache-kreierer-kim-dotcom-bietet-arbeitsplaetze-fuer-blockchain-goetter/',
            'body' => [
                '//div[@class="post-inner"]//div[@class="entry"]',
            ],
            'strip' => [
                '//div[contains(@class, "shariff")]',
            ],
        ],
    ],
];
