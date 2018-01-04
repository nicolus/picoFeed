<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.howtogeek.com/235283/what-is-a-wireless-hard-drive-and-should-i-get-one/',
            'body' => [
                '//div[@class="thecontent"]',
            ],
            'strip' => [
                '//*[@class="relatedside"]',
            ],
        ],
    ],
];
