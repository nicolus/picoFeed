<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.fakingnews.firstpost.com/2016/01/engineering-student-creates-record-in-a-decade-becomes-the-first-to-completely-exhaust-ball-pen-refill/',
            'body' => [
                '//div[@class="entry"]',
            ],
            'strip' => [
                '//*[@class="socialshare_bar"]',
                '//*[@class="authorbox"]',
                '//*[@class="cf5_rps"]',
                '//*[@class="60563 fb-comments fb-social-plugin"]',
            ],
        ],
    ],
];
