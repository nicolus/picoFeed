<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://online.wsj.com/article/SB10001424127887324108204579023143974408428.html',
            'body' => [
                '//div[@class="articlePage"]',
            ],
            'strip' => [
                '//*[@id="articleThumbnail_2"]',
                '//*[@class="socialByline"]',
            ]
        ]
    ]
];
