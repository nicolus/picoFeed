<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://takprosto.cc/kokteyl-dlya-pohudeniya-v-domashnih-usloviyah/',
            'body' => [
                '//div[contains(@class, "entry-contentt")]',
            ],
            'strip' => [
                '//script',
                '//form',
                '//style',
                '//*[@class="views_post"]',
                '//*[contains(@class, "mailchimp-box")]',
                '//*[contains(@class, "essb_links")]',
                '//*[contains(@rel, "nofollow")]',
                '//*[contains(@class, "ads")]',
            ],
        ],
    ],
];
