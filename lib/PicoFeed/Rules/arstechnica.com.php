<?php

return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://arstechnica.com/tech-policy/2015/09/judge-warners-2m-happy-birthday-copyright-is-bogus/',
            'body' => array(
                '//div[@class="left-column"]',
            ),
            'strip' => array(
                '//h4[@class="post-upperdek"]',
                '//h1',
                '//section[@class="post-meta"]',
                '//figcaption',
                '//aside',
                '//div[@class="gallery-image-credit"]',
                '//div[@class="article-expander"]',
                '//div[@class="column-wrapper"]'
            ),
        ),
    ),
);
