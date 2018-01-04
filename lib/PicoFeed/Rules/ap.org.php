<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://hosted.ap.org/dynamic/stories/A/AS_CHINA_GAO_ZHISHENG?SITE=AP&SECTION=HOME&TEMPLATE=DEFAULT',
            'body' => [
                '//img[@class="ap-smallphoto-img"]',
                '//span[@class="entry-content"]',
            ],
            'strip' => [],
        ],
    ],
];
