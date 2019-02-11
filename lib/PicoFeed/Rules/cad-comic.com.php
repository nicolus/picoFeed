<?php
return [
    'grabber' => [
        '%/cad/.+%' => [
            'test_url' => 'http://www.cad-comic.com/cad/20150417',
            'body' => [
                '//*[@id="content"]/img',
            ],
            'strip' => [],
        ],
    ],
];
