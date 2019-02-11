<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.theguardian.com/sustainable-business/2015/feb/02/2015-hyper-transparency-global-business',
            'body' => [
                '//div[contains(@class, "content__main-column--article")]',
            ],
            'strip' => [
                '//div[contains(@class, "meta-container")]',
            ],
        ]
    ]
];
