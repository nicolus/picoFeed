<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.degroupnews.com/medias/vodsvod/amazon-concurrence-la-chromecast-de-google-avec-fire-tv-stick',
            'body' => [
                '//div[@class="contenu"]',
            ],
            'strip' => [
                '//div[contains(@class, "a2a")]',
            ],
        ],
    ],
];
