<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://hirek.prim.hu/cikk/2017/10/02/atadtak_a_6_fenntarthatosagi_sajtodijat',
            'body' => [
                '//div[@class="boxbody article_box"]/h2',
                '//div[@class="text_body"]'
            ],
            'strip' => [
            ]
        ],
    ],
];
