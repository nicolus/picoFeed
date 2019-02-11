<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.sciencemag.org/news/2016/01/could-bright-foamy-wak$',
            'body' => [
                '//div[@class="row--hero"]',
                '//article[contains(@class,"primary")]',
            ],
            'strip' => [
                '//header[@class="article__header"]',
                '//footer[@class="article__foot"]',
            ],
        ],
    ]
];
