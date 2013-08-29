<?php
return array(
    'title' => '//meta[@property=\'og:title\']/@content',
    'test_url' => 'http://www.salon.com/2011/10/25/occupying_the_rust_belt/singleton/',
    'body' => array(
         '(//div[contains(@class, \"articleInner\")]//img[contains(@src, \'media.salon.com\') and contains(@src, \'460x\')])[1] | //div[contains(@class, \"articleContent\") or contains(@class, \"writerMeta\")]',
    ),
    'single_page_link' => array(
         '(//h1/a[contains(@href, \'/singleton\')])[1]',
    ),
);
