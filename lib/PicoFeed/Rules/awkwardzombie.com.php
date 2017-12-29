<?php
return [
    'grabber' => [
        '%/index.php.*comic=.*%' => [
            'test_url' => 'http://www.awkwardzombie.com/index.php?comic=041315',
            'body' => ['//*[@id="comic"]/img'],
            'strip' => [],
        ],
    ],
];
