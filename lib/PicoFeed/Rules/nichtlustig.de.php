<?php
return [
    'filter' => [
        '%.*%' => [
            '%.*static.nichtlustig.de/comics/full/(\\d+).*%s' => '<img src="http://static.nichtlustig.de/comics/full/$1.jpg" />',
        ],
    ],
];
