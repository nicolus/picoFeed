<?php
return [
    'filter' => [
        '%.*%' => [
            '%alt="(.+)" title="(.+)" */>%' => '/><br/>$1<br/>$2',
        ],
    ],
];
