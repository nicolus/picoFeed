<?php
return [
    'grabber' => [
        '%/archives.*%' => [
            'test_url' => 'http://niceteethcomic.com/archives/page119/',
            'body' => ['//*[@class="comicpane"]/a/img'],
            'strip' => [],
        ],
    ],
];
