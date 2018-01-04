<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.alainonline.net/news_details.php?lang=arabic&sid=18907',
            'body' => [
                '//div[@class="news_details"]',
            ],
            'strip' => [
                '//div[@class="news_details"]/div/div[last()]',
            ],
        ],
    ],
];
