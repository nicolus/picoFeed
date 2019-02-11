<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.achgut.com/artikel/deutscher_herbst_wg_reichsstrasse_106',
            'body' => [
                '//div[@class="headerpict_half"]/div/img',
                '//div[@class="beitrag"]/div[@class="teaser_blog_text"]'
            ],
            'strip' => [
                '//div[@class="footer_blog_text"]',
                '//div[@class="beitrag"]/div[@class="teaser_blog_text"]/h2[1]'
            ]
        ],
    ],
];
