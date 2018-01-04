<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://gorabbit.ru/article/10-oshchushcheniy-za-rulem-kogda-tolko-poluchil-voditelskie-prava',
            'body' => [
                '//div[@class="detail_text"]',
            ],
            'strip' => [
                '//script',
                '//form',
                '//style',
                '//div[@class="socials"]',
                '//div[@id="cr_1"]',
                '//div[@class="related_items"]',
            ],
        ],
    ],
];
