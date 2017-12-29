<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://fototelegraf.ru/?p=348232',
            'body' => [
                '//div[@class="post-content"]',
            ],
            'strip' => [
                '//script',
                '//form',
                '//style',
                '//div[@class="imageButtonsBlock"]',
                '//div[@class="adOnPostBtwImg"]',
                '//div[contains(@class, "post-tags")]',
            ],
        ],
    ],
];
