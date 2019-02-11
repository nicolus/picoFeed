<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.gamechannel.hu/cikk/hirblock/a-legacy-of-kain-feltamasztasara-keszul-a-crystal-dynamics',
            'body' => [
                '//div[@class="post"]/div[@class="entry"]'
            ],
            'strip' => [
                '//div[@class="valaszto"]',
                '//center/blockquote' // as we can't grab iframe here
            ]
        ],
    ],
];
