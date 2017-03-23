<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://arstechnica.com/tech-policy/2015/09/judge-warners-2m-happy-birthday-copyright-is-bogus/',
            'body' => array(
                '//article',
            ),
            'strip' => array(
                '//h4[@class="post-upperdek"]',
                '//h1',
                '//div[@class="gallery shortcode-gallery"]',
                '//section[@class="post-meta"]',
                '//figcaption',
                '//aside',
                '//div[@class="gallery-image-credit"]',
                '//section[@class="article-author"]',
                '//*[contains(@id,"social-")]',
                '//div[contains(@id,"footer")]'
            ),
        ),
    ),
);

