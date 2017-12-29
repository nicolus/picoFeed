<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.geek.com/news/the-11-best-ways-to-eat-eggs-1634076/',
            'body' => [
                '//div[@class="articleinfo"]/figure',
                '//div[@class="articleinfo"]/article',
                '//span[@class="by"]',
            ],
            'strip' => [
                '//span[@class="red"]',
                '//div[@class="on-target"]'
            ],
        ],
    ],
];
