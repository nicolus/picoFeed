<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.themoscowtimes.com/business/article/535500.html',
            'body' => [
                '//div[@class="article_main_img"]',
                '//div[@class="article_text"]',
            ],
            'strip' => [
                '//div[@class="articlebottom"]',
                '//p/b',
                '//p/a[contains(@href, "/article.php?id=")]',
                '//div[@class="disqus_wrap"]',
            ],
        ],
    ],
];
