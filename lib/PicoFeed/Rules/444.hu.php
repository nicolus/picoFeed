<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'https://444.hu/2017/10/20/tulszamlazo-helyen-utottek-rajta-budapest-belvarosaban',
            'body' => [
                '//div[@id="headline"]/h1',
                '//article'
            ],
            'strip' => [
                '//article/footer',
                '//article/div[@class="jeti-roadblock ad"]',
                '//figcaption',
                '//noscript',
                '//ul[@class="widget-stream-items"]'
            ]
        ],
    ],
];
