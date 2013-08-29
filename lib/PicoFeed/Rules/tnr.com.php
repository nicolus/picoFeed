<?php
return array(
    'title' => '//div[contains(@class, \'article_detail\')]/div[@class=\'entry_header\']/h1',
    'title' => '//div[contains(@class, \'article_detail\')]//h1',
    'title' => '//h1',
    'test_url' => 'http://www.tnr.com/blog/jonathan-chait/92991/did-obama-get-rolled',
    'body' => array(
         '//div[contains(@class, \'article_detail\')]',
    ),
    'strip' => array(
         '//div[contains(@class, \'field-field-book-cover\')]',
    ),
    'single_page_link' => array(
         '//a[@class=\'print-page\']',
    ),
);
