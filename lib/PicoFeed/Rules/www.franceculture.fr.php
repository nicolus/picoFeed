<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.franceculture.fr/emission-culture-eco-la-finance-aime-toujours-la-france-2016-01-08',
            'body' => [
                '//div[@class="text-zone"]',
            ],
            'strip' => [
                '//ul[@class="tags"]',
            ],
        ]
    ]
];
