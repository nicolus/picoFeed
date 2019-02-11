<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.smbc-comics.com/comic/the-troll-toll',
            'body' => [
                '//div[@id="cc-comicbody"]',
                '//div[@id="aftercomic"]',
            ],
            'strip' => [
            ],
        ],
    ],
];
