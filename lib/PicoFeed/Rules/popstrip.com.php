<?php
return [
    'filter' => [
        '%.*%' => [
            '%(<img.+/s/[^"]+/)(.+)%' => '$1$2$1bonus.png"/>',
        ],
    ],
];
