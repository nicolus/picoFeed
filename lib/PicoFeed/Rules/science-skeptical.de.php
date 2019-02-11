<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.science-skeptical.de/politik/diesel-die-lueckenmedien-im-glashaus-6/0016080/',
            'body' => [
                '//div[@class="pf-content"]',
            ],
            'strip' => [
                '//div[contains(@class, "printfriendly")]',
            ]
        ],
    ],
];
