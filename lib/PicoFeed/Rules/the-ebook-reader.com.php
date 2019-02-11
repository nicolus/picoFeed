<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://blog.the-ebook-reader.com/2015/09/25/kobo-glo-hd-and-kobo-touch-2-0-covers-and-cases-roundup/',
            'body' => [
                '//div[@class="entry"]',
            ],
            'strip' => [
                '//div[@id="share"]',
                '//div[contains(@class,"ItemCenter")]',
            ],
        ],
    ],
];
