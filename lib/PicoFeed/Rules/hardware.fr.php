<?php
return [
    'grabber' => [
        '%^/news.*%' => [
            'test_url' => 'http://www.hardware.fr/news/14760/intel-lance-nouveaux-ssd-nand-3d.html',
            'body' => [
                '//div[@class="content_actualite"]/div[@class="md"]',
            ]
        ],
    ],
];
