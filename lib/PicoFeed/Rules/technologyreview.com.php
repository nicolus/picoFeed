<?php
return array(
    'title' => '//header[@class=\'article-meta\']/h1',
    'title' => 'substring-before(//title, \'|\')',
    'test_url' => 'http://www.technologyreview.com/news/427567/facebooks-telescope-on-human-behavior/',
    'body' => array(
         '//section[contains(@class, \'body\')]',
    ),
    'next_page_link' => array(
         '//section[@class=\'pagination\']/a[contains(@class, \'continue\')]',
    ),
);
