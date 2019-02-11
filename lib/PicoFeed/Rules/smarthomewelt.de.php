<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://smarthomewelt.de/apple-tv-amazon-echo-smart-home/',
            'body' => ['//div[@class="entry-inner"]/p | //div[@class="entry-inner"]/div[contains(@class,"wp-caption")]'],
            'strip' => [],
        ],
    ],
];
