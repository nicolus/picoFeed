<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.portfolio.hu/gazdasag/mennybe-vagy-pokolba-megy-ma-a-cseh-trump.265833.html',
            'body' => [
                '//div[@id="cikk"]/h1',
                '//div[@class="smscontent"]'
            ],
            'strip' => [
                '//div[@class="traderhirdetes ga_viewanalytics"]'
            ]
        ],
    ],
];
