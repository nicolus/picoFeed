<?php

return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://www.chinafile.com/books/shanghai-faithful?utm_source=feedburner&utm_medium=feed&utm_campaign=Feed%3A+chinafile%2FAll+%28ChinaFile%29',
            'body' => array(
            '//div[@class="l-cf-twocol l-panel"]',
            ),
            'strip' => array(
                '//div[contains(@class,"l-top")]',
                '//div[contains(@class,"video-embed")]',
                '//div[contains(@class,"pane-node-title")]',
                '//div[contains(@class,"pane-node-authors-date")]',
                '//div[contains(@class,"-share")]',
                '//div[contains(@class,"cboxes")]',
                '//aside'
            ),
        ),
    ),
);

