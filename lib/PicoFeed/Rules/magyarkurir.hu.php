<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.magyarkurir.hu/hirek/a-vilagszerte-ismert-dicsoito-csapat-hillsong-young-free-lep-fel-budapesten',
            'body' => [
                '//div[@class="behuzas"]'
            ],
            'strip' => [
                '//div[@class="ikonsav"]',
                '//p[@class="copyright"]',
                '//div[@class="cimkek"]',
                '//div[@id="footerbanner"]',
                '//div[@class="rovat sargabg rovatdobozcim"]',
                '//div[@class="rovatdoboz"]',
                '//a[contains(., "Own")]',
                '//a[@class="fblink"]'
            ]
        ],
    ],
];
