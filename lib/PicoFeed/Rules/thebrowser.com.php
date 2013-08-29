<?php
return array(
    'title' => '//h2[contains(@class, \'page-title\')]',
    'test_url' => 'http://thebrowser.com/interviews/yotam-ottolenghi-on-his-favourite-cookery-books',
    'body' => array(
         '//div[@id=\'content\']/div[contains(@id, \'node-\')]/div[@class=\'content\']',
    ),
    'strip' => array(
         '//div[contains(@class, \'node-book\')]//a[@class=\'button\']',
    ),
    'single_page_link' => array(
         '//a[@class=\'tool-print\']',
    ),
);
