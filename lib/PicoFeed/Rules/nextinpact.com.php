<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.nextinpact.com/news/101122-3d-nand-intel-lance-six-nouvelles-gammes-ssd-pour-tous-usages.htm',
            'body' => [
                '//div[@class="container_article"]',
            ],
            'strip' => [
                '//div[@class="infos_article"]',
                '//div[@id="actu_auteur"]',
                '//div[@id="soutenir_journaliste"]',
                '//section[@id="bandeau_abonnez_vous"]',
                '//br'
            ],
        ],
    ],
];
