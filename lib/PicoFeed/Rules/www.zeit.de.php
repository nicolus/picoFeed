<?php
return [
    'grabber' => [
        '%^/zeit-magazin.*%' => [
            'test_url' => 'http://www.zeit.de/zeit-magazin/2015/15/pegida-kathrin-oertel-lutz-bachmann',
            'body' => [
                '//article[@class="article"]',
            ],
            'strip' => [
                '//header/div/h1',
                '//header/div/div[@class="article__head__subtitle"]',
                '//header/div/div[@class="article__column__author"]',
                '//header/div/div[@class="article__column__author"]',
                '//header/div/span[@class="article__head__meta-wrap"]',
                '//form',
                '//style',
                '//div[contains(@class, "ad-tile")]',
                '//div[@class="iqd-mobile-adplace"]',
                '//div[@id="iq-artikelanker"]',
                '//div[@id="js-social-services"]',
                '//section[@id="js-comments"]',
                '//aside',
            ],
        ],
        '%.*%' => [
            'test_url' => 'http://www.zeit.de/politik/ausland/2015-04/thessaloniki-krise-griechenland-yannis-boutaris/',
            'body' => [
                '//div[@class="article-body"]',
            ],
            'strip' => [
                '//*[@class="articleheader"]',
                '//*[@class="excerpt"]',
                '//div[contains(@class, "ad")]',
                '//div[@itemprop="video"]',
                '//*[@class="articlemeta"]',
                '//*[@class="articlemeta-clear"]',
                '//*[@class="zol_inarticletools"]',
            ],
        ],
    ],
];
