<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://distrowatch.com/?newsid=08355',
            'body' => [
                '//td[@class="NewsText"][1]',
            ],
            'strip' => [
            ],
        ],
    ],
];
