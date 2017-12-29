<?php
return [
    'grabber' => [
        '%/comic/.*%' => [
            'test_url' => 'http://theawkwardyeti.com/comic/things-to-do/',
            'body' => [
                '//div[@id="comic"]'
            ],
            'strip' => []
        ]
    ]
];
