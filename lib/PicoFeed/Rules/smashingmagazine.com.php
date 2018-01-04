<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.smashingmagazine.com/2015/04/17/using-sketch-for-responsive-web-design-case-study/',
            'body' => ['//article[contains(@class,"post")]/p'],
            'strip' => [],
        ],
    ],
];
