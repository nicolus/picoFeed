<?php

return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.biztimes.com/2017/02/10/settlement-would-revive-fowler-lake-condo-project-in-oconomowoc/',
            'body' => array(
            '//div[contains(@class,"desktop-article-content")]',
            ),
            'strip' => array(
                '//script',
                '//div[contains(@class,"sharedaddy")]',
                '//div[contains(@class,"author-details")]',
                '//div[contains(@class,"relatedposts")]',
                '//div[@class="col-lg-12"]',
                '//div[contains(@class,"widget")]',
            ),
        ),
    ),
);
