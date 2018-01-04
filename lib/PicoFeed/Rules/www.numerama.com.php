<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.numerama.com/sciences/125959-recherches-ladn-recompensees-nobel-de-chimie.html',
            'body' => [
                '//article',
            ],
            'strip' => [
                '//footer',
                '//section[@class="related-article"]',
            ],
        ],
    ],
];
