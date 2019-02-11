<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.engadget.com/2015/04/20/dark-matter-discovery/?ncid=rss_truncated',
            'body' => ['//div[@id="page_body"]/div[@class="container@m-"]'],
            'strip' => ['//aside[@role="banner"]'],
        ],
    ],
];
