<?php
return [
    'grabber' => [
        '%.*%' => [
            'body' => ['//img[@id="comicimage"]'],
            'strip' => [],
            'test_url' => 'http://drawingboardcomic.com/index.php?comic=208',
        ],
    ],
    'filter' => [
        '%.*%' => [
            '%title="(.+)" */>%' => '/><br/>$1',
        ],
    ],
];
