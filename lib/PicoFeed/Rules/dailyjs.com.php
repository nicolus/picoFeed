<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://dailyjs.com/2014/08/07/p5js/',
            'body' => [
                '//div[@id="post"]',
            ],
            'strip' => [
                '//h2[@class="post"]',
                '//div[@class="meta"]',
                '//*[contains(@class, "addthis_toolbox")]',
                '//*[contains(@class, "addthis_default_style")]',
                '//*[@class="navigation small"]',
                '//*[@id="related"]',
            ],
        ],
    ],
];
