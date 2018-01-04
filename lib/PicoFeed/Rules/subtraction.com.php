<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.subtraction.com/2015/06/06/time-lapse-video-of-one-world-trade-center/',
            'body' => ['//article/div[@class="entry-content"]'],
            'strip' => [],
        ],
    ],
    'filter' => [
        '%.*%' => [
            '%\+<h3.*/ul>%' => '',
        ],
    ],
];
