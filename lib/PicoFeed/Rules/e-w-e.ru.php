<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://e-w-e.ru/16-prekrasnyx-izobretenij-zhenshhin/',
            'body' => [
                '//div[contains(@class, "post_text")]',
            ],
            'strip' => [
                '//script',
                '//form',
                '//style',
                '//*[@class="views_post"]',
                '//*[@class="adman_mobile"]',
                '//*[@class="adman_desctop"]',
                '//*[contains(@rel, "nofollow")]',
                '//*[contains(@class, "wp-smiley")]',
                '//*[contains(text(),"Источник:")]',
            ],
        ],
    ],
];
