<?php
return array(
    'title' => '//h2[@property=\'dc:title\']',
    'test_url' => 'http://www.thenation.com/article/162331/hard-against-time-roy-fisher',
    'body' => array(
         '//div[@id=\'wysiwyg\']',
    ),
    'single_page_link' => array(
         '//ul[contains(@class, \'article-actions-bar\')]//a[contains(@href, \'?page=full\')]',
    ),
);
