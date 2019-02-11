<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.bdgest.com/chronique-6027-BD-Adrastee-Tome-2.html',
            'body' => [
                '//*[contains(@class, "chronique")]',
            ],
            'strip' => [
                '//*[contains(@class, "post-review")]',
                '//*[contains(@class, "footer-review")]',
            ],
        ],
    ],
];
