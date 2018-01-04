<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://encyclopedie.naheulbeuk.com/article.php3?id_article=352',
            'body' => [
                '//td//h1[@class="titre-texte"]',
                '//td//div[@class="surtitre"]',
                '//td//div[@class="texte"]',
            ],
        ]
    ],
];
