<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => [
                'http://www.legorafi.fr/2016/12/16/gorafi-magazine-bravo-vous-avez-bientot-presque-survecu-a-2016/',
                'http://www.legorafi.fr/2016/12/15/manuel-valls-promet-quune-fois-elu-il-debarrassera-la-france-de-manuel-valls/',
            ],
            'body' => [
                '//section[@id="banner_magazine"]',
                '//figure[@class="main_picture"]',
                '//div[@class="content"]',
            ],
            'strip' => [
                '//figcaption',
                '//div[@class="sharebox"]',
                '//div[@class="tags"]',
                '//section[@class="taboola_article"]',
            ],
        ],
    ],
];
