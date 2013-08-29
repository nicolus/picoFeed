<?php
return array(
    'title' => '//div[@id=\'content\']/h1',
    'test_url' => 'http://www.informit.com/articles/article.aspx?p=1729268',
    'body' => array(
         '//div[@id=\"content\"]',
    ),
    'strip' => array(
         '//img[contains(@src, \'informit_printer.png\')]',
    ),
    'single_page_link' => array(
         '//div[contains(@class, \'articleTools\')]//a[contains(@href, \'/printerfriendly.\')]',
    ),
);
