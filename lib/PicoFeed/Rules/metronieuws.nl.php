<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.metronieuws.nl/sport/2015/04/broer-fellaini-zorgde-bijna-voor-paniek-bij-mourinho',
            'body' => ['//div[contains(@class,"article-top")]/div[contains(@class,"image-component")] | //div[@class="article-full-width"]/div[1]'],
            'strip' => [],
        ],
    ],
];
