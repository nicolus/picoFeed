<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://www.oneindia.com/india/b-luru-govt-likely-remove-word-eunuch-from-sec-36-a-karnataka-police-act-1981173.html',
            'body' => [
                '//div[@class="ecom-ad-content"]',
            ],
            'strip' => [
                '//*[@id="view_cmtns"]',
            ],
        ],
    ],
];
