<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.makeuseof.com/tag/having-problems-with-audio-in-windows-10-heres-a-likely-fix/',
            'body' => [
                '//div[@class="entry"]',
            ],
            'strip' => [
                '//*[@class="new_sharebar"]',
                '//*[@class="author"]',
                '//*[@class="wdt_grouvi"]',
                '//*[@class="wdt_smart_alerts"]',
                '//*[@class="modal fade grouvi"]',
            ],
        ],
    ],
];
