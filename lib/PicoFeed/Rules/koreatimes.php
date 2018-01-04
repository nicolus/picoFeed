<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.koreatimes.co.kr/www/news/nation/2015/12/116_192409.html',
            'body' => [
                '//div[@id="p"]',
            ],
            'strip' => [
                '//div[@id="webtalks_btn_listenDiv"]',
            ],
        ],
    ],
];
