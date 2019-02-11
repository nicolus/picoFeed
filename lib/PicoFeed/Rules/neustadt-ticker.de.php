<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.neustadt-ticker.de/41302/alltag/kultur/demo-auf-der-boehmischen',
            'body' => [
                '//div[@class="entry-content"]',
            ],
            'strip' => [
                '//*[contains(@class, "sharedaddy")]',
                '//*[contains(@class, "yarpp-related")]',
            ],
        ],
    ],
];
