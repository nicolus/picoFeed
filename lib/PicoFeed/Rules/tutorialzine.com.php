<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'https://tutorialzine.com/2017/10/15-interesting-javascript-and-css-libraries-for-october-2017',
            'body' => [
                '//article'
            ],
            'strip' => [
                '//div[@class="article__header"]',
                '//div[@class="article__share"]',
                '//div[@class="article__footer"]',
                '//div[@id="article__related-articles"]',
                '//div[@class="webappstudio-animation"]',
                '//div[@class="ad-container adsbygoogle hidden-xs hidden-sm"]',
                '//script'
            ]
        ],
    ],
];
