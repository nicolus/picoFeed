<?php

return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://www.economist.com/blogs/buttonwood/2017/02/mixed-signals?fsrc=rss',
            'body' => array(
                '//div[@class="main-content"]',
            ),
            'strip' => array(
                '//aside[@class="main-content-container"]',
            ),
        ),
    ),
);
