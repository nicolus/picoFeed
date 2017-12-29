<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.phoronix.com/scan.php?page=article&item=amazon_ec2_bare&num=1',
            'body' => [
                '//div[@class="content"]',
            ],
            'strip' => [],
        ],
    ],
];
