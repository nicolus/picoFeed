<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://dozodomo.com/bento/2014/03/04/lart-des-maki-de-takayo-kiyota/',
            'body' => [
                '//div[@class="joke"]',
                '//div[@class="story-cover"]',
                '//div[@class="story-content"]',
            ],
            'strip' => [
            ],
        ],
    ],
];
