<?php

return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://www.securityfocus.com/news/11569?ref=rss',
            'body' => array(
                '//span[@class="body"]',
            ),
            'strip' => array(
                '//div[@id="logo_new"]',
                '//div[@id="bannerAd"]',
                '//div[@align="right"]'

            ),
        ),
    ),
);
