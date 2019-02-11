<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'https://zarojel.hu/meg-egyszer-a-foldi-ugyrol-is/',
            'body' => [
                '//div[@class="entry-category"]/h1',
                '//div[@class="entry-content"]/div[@class="vc_row wpb_row vc_row-fluid"]'
            ],
            'strip' => [
                '//ins[@class="adsbygoogle"]',
                '//script',
                '//figcaption',
                '//p[contains(text(),"Kapcsolódó")]',
                '//div[@class="wpb_wrapper"]/p[@class="entry-title"]'
            ]
        ],
    ],
];
