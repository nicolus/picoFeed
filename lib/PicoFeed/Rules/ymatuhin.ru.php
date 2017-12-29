<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'https://ymatuhin.ru/tools/git-default-editor/',
            'body' => [
                '//section',
            ],
            'strip' => [
                "//script",
                "//style",
                "//h1",
                "//time",
                "//aside",
                "/html/body/section/ul",
                "//amp-iframe",
                "/html/body/section/h4"
            ],
        ]
    ]
];
