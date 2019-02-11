<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://milwaukeenns.org/2016/01/08/united-way-grant-enables-sdc-to-restore-free-tax-assistance-program/',
            'body' => [
                '//div[@class="pf-content"]',
            ],
            'strip' => [
                '//div[@class="printfriendly"]',
            ],
        ],
    ],
];
