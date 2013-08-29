<?php
return array(
    'title' => '//meta[@property=\"og:title\"]/@content',
    'test_url' => 'http://www.cnet.com/8301-13952_1-57367607-81/the-404-981-where-the-world-is-a-vampire-podcast/',
    'body' => array(
         '//div[contains(@class, \'postBody\')]',
    ),
    'strip_id_or_class' => array(
         'image-credit',
         'noAutolink',
         'related',
    ),
);
