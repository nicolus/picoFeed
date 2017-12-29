<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://justcoolidea.ru/idealnyj-sad-samodelnye-proekty-dlya-berezhlivogo-domovladeltsa/',
            'body' => [
                '//section[@class="entry-content"]',
            ],
            'strip' => [
                '//script',
                '//form',
                '//style',
                '//*[contains(@class, "essb_links")]',
                '//*[contains(@rel, "nofollow")]',
                '//*[contains(@class, "ads")]',
            ],
        ],
    ],
];
