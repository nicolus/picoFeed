<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.securityfocus.com/archive/1/540139',
            'body' => [
                '//div[@id="vulnerability"]',
                '//div[@class="comments_reply"]',
            ],
            'strip' => [
                '//span[@class="title"]',
                '//div[@id="logo_new"]',
                '//div[@id="bannerAd"]',
            ],
        ],
    ],
];
