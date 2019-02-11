<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'https://www.muckrock.com/news/archives/2016/jan/13/5-concerns-private-prisons/',
            'body' => [
                '//div[@class="content"]',
            ],
            'strip' => [
                '//div[@class="newsletter-widget"]',
                '//div[@class="contributors"]',
                '//time',
                '//h1',
                '//div[@class="secondary"]',
                '//aside',
                '//div[@class="articles__related"]'
            ],
        ],
    ],
];
