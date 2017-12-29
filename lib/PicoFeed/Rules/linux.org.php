<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.linux.org/threads/lua-the-scripting-interpreter.8352/',
            'body' => [
                '//div[@class="messageContent"]',
            ],
            'strip' => [
                '//aside',
            ],
        ],
    ],
];
