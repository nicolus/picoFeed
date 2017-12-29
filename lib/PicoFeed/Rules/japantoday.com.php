<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.japantoday.com/category/politics/view/japan-u-s-to-sign-new-base-environment-pact',
            'body' => [
                '//div[@id="article_container"]',
            ],
            'strip' => [
                '//h2',
                '//div[@id="article_info"]',
            ],
        ],
    ],
];
