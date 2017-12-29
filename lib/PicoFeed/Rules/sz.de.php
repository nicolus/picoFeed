<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://sz.de/1.2443161',
            'body' => ['//article[@id="sitecontent"]/section[@class="topenrichment"]//img | //article[@id="sitecontent"]/section[@class="body"]/section[@class="authors"]/preceding-sibling::*[not(contains(@class, "ad"))]'],
            'strip' => [],
        ],
    ],
];
