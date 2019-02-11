<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'https://www.scrumalliance.org/community/articles/2015/march/an-introduction-to-agile-project-intake?feed=articles',
            'body' => [
                '//div[@class="article_content"]',
            ],
            'strip' => [],
        ],
    ],
];
