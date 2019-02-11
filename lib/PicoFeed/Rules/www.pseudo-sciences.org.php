<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.pseudo-sciences.org/spip.php?article2275',
            'body' => [
                '//div[@id="art_main"]',
            ],
            'strip' => [
                '//div[@id="art_print"]',
                '//div[@id="art_chapo"]',
                '//img[@class="puce"]',
            ],
        ],
    ],
];
