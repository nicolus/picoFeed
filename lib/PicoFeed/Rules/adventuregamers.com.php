<?php
return [
    'grabber' => [
        '%^/news.*%' => [
            'test_url' => 'http://www.adventuregamers.com/news/view/31079',
            'body' => [
                '//div[@class="bodytext"]',
            ]
        ],
        '%^/videos.*%' => [
            'test_url' => 'http://www.adventuregamers.com/videos/view/31056',
            'body' => [
                '//iframe',
            ]
        ],
        '%^/articles.*%' => [
            'test_url' => 'http://www.adventuregamers.com/articles/view/31049',
            'body' => [
                '//div[@class="cleft"]',
            ]
        ]
    ],
];
