<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://opensource.com/life/15/10/how-internet-things-will-change-way-we-think',
            'body' => [
                '//div[@id="article-template"]',
            ],
            'strip' => [
                '//div[contains(@class,"os-article__sidebar")]',
                '//div[@class="panel-pane pane-node-title"]',
                '//div[@class="panel-pane pane-os-article-byline"]',
                '//ul',
                '//div[contains(@class,"-license")]',
                '//div[contains(@class,"-tags")]',
                '//div[@class="panel-pane pane-os-article-byline"]',
                '//div[@class="os-article__content-below"]',
                '//div[@id="comments"]'
            ],
        ],
    ],
];
