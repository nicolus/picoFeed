<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.monsieur-le-chien.fr/index.php?planche=672',
            'body' => [
                '//img[starts-with(@src, "i/planches/")]',
            ],
        ]
    ]
];
