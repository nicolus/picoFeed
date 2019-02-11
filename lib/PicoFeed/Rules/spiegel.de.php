<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.spiegel.de/politik/ausland/afrika-angola-geht-gegen-islam-vor-und-schliesst-moscheen-a-935788.html',
            'body' => [
                '//div[@class="spArticleContent"]/p | //div[@class="spArticleContent"]//img[@class="spResponsiveImage "]',
            ],
            'strip' => [
                '//div[@class="author-details"]',
            ],
        ],
    ],
];
