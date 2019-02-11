<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.thegamercat.com/comic/just-no/',
            'body' => ['//div[@id="comic"] | //div[@class="post-content"]/div[@class="entry"]/p'],
            'strip' => [],
        ],
    ],
];
