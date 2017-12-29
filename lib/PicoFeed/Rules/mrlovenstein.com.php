<?php
return [
    'filter' => [
        '%.*%' => [
            '%alt="(.+)" */>%' => '/><br/>$1',
            '%\.png%' => '_rollover.png',
        ],
    ],
];
