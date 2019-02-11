<?php
return [
    'grabber' => [
        '%/comics.*%' => [
            'test_url' => 'http://www.vgcats.com/comics/?strip_id=358',
            'body' => ['//*[@align="center"]/img'],
            'strip' => [],
        ],
        '%/super.*%' => [
            'test_url' => 'http://www.vgcats.com/super/?strip_id=84',
            'body' => ['//*[@align="center"]/p/img'],
            'strip' => [],
        ],
    ],
];
