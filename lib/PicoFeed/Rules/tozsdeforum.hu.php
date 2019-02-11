<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.tozsdeforum.hu/szemelyes-penzugyek/napi-penzugyek/ezek-a-legnepszerubb-turistacelpontok-voltal-mar-mindenhol-87181.html',
            'body' => [
                '//header/h1',
                '//div[@class="title_img"]',
                '//article/div[@class="tf-post"]/div[@class="p"]/p|//article/div[@class="tf-post"]/div[@class="p"]/h3|//article/div[@class="tf-post"]/div[@class="p"]/blockquote'
            ],
            'strip' => [
            ]
        ],
    ],
];
