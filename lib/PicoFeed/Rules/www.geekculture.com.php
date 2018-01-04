<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.geekculture.com/joyoftech/joyarchives/2180.html',
            'body' => [
                '//p[contains(@class,"Maintext")][2]/a/img[contains(@src,"joyimages")]',
            ],
            'strip' => [],
        ],
    ],
];

