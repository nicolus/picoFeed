<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://hvg.hu/brandchannel/mastercardbch_20171006_Egyetlen_mobillal_erintettuk_Budapest_legjobb_gasztrohelyeit',
            'body' => [
                '//div[@class="article-title article-title"]',
                '//div[@class="article-cover-img"]',
                '//div[@class="article-main"]'
            ],
            'strip' => [
                '//figcaption',
                '//div[@class="article-info byline"]'
            ]
        ],
    ],
];
