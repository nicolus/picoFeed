<?php
return [
    'grabber' => [
        '%.*%' => [
            'title' => '//header/h1',
            'test_url' => 'http://bits.blogs.nytimes.com/2012/01/16/wikipedia-plans-to-go-dark-on-wednesday-to-protest-sopa/',
            'body' => [
                '//div[@class="postContent"]',
            ],
            'strip' => [
                '//*[@class="shareToolsBox"]',
            ],
        ]
    ]
];
