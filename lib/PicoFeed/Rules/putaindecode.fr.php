<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://putaindecode.fr/posts/js/etat-lieux-js-modulaire-front/',
            'body' => [
                '//*[@class="putainde-Post-md"]',
            ],
            'strip' => [
                '//*[contains(@class, "inlineimg")]',
                '//*[contains(@class, "comment-respond")]',
                '//header',
            ],
        ],
    ],
];
