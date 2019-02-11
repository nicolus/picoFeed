<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'https://publicpolicyforum.org/blog/going-extra-mile',
            'body' => [
                '//div[contains(@class,"field-name-post-date")]',
                '//div[contains(@class,"field-name-body")]',
            ],
            'strip' => [
                '//img[@src="http://publicpolicyforum.org/sites/default/files/logo3.jpg"]',
            ],
        ],
    ],
];
