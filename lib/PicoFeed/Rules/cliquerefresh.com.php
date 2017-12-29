<?php
return [
    'grabber' => [
        '%/comic.*%' => [
            'test_url' => 'http://cliquerefresh.com/comic/078-stating-the-obvious/',
            'body' => ['//div[@class="comicImg"]/img | //div[@class="comicImg"]/a/img'],
            'strip' => [],
        ],
    ],
];
