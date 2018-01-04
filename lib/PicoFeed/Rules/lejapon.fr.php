<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://lejapon.fr/guide-voyage-japon/5223/tokyo-sous-la-neige.htm',
            'body' => [
                '//div[@class="entry"]',
            ],
            'strip' => [
                '//*[contains(@class, "addthis_toolbox")]',
                '//*[contains(@class, "addthis_default_style")]',
                '//*[@class="navigation small"]',
                '//*[@id="related"]',
            ],
        ],
    ],
];
