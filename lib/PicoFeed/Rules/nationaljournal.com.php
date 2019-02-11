<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.nationaljournal.com/s/354962/south-carolina-evangelicals-outstrip-establishment?mref=home_top_main',
            'body' => [
                '//div[@class="section-body"]',
            ],
            'strip' => [
                '//*[contains(@class, "-related")]',
                '//*[contains(@class, "social")]',
            ],
        ],
    ],
];
