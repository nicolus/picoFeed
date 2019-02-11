<?php
return [
    'grabber' => [
        '%/comics/oots.*%' => [
            'test_url' => 'http://www.giantitp.com/comics/oots0989.html',
            'body' => [
                '//td[@align="center"]/img',
            ],
            'strip' => [],
        ],
    ],
];
