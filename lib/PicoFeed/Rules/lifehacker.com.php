<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://lifehacker.com/bring-water-bottle-caps-into-concerts-to-protect-your-d-1269334973',
            'body' => [
                '//div[contains(@class, "row")/img',
                '//div[contains(@class, "content-column")]',
            ],
            'strip' => [
                '//*[contains(@class, "meta")]',
                '//span[contains(@class, "icon")]',
                '//h1',
                '//aside',
            ],
        ],
    ],
];
