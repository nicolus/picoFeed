<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.universfreebox.com/article/24305/4G-Bouygues-Telecom-lance-une-vente-flash-sur-son-forfait-Sensation-3Go',
            'body' => [
                '//div[@id="corps_corps"]',
            ],
            'strip' => [
                '//*[@id="formulaire"]',
                '//*[@id="commentaire"]',
            ],
        ],
    ],
];
