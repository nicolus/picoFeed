<?php
return [
    'grabber' => [
        '%/news/.*%' => [
            'test_url' => 'http://penny-arcade.com/news/post/2015/04/15/101-part-two',
            'body' => [
                '//*[@class="postBody"]/*',
            ],
            'strip' => [
            ],
        ],
        '%/comic/.*%' => [
            'test_url' => 'http://penny-arcade.com/comic/2015/04/15',
            'body' => [
                '//*[@id="comicFrame"]/a/img',
            ],
            'strip' => [
            ],
        ],
    ],
];
