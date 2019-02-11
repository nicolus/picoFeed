<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.bauerwilli.com/intuitive-eating/',
            'body' => [
                '//div[@class="entry-thumbnail"]',
                '//div[@class="entry-content"]',
            ],
            'strip' => [
                '//div[@class="tptn_counter"]',
                '//div[contains(@class, "sharedaddy")]'
            ],
        ],
    ],
];

