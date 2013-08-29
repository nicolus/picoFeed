<?php
return array(
    'title' => '//h2[@class=\'article-title\']',
    'test_url' => 'http://theeuropean-magazine.com/522-casertano-stefano/919-morsi-and-the-future-of-egypt',
    'body' => array(
         '//div[@class=\'article\']',
    ),
    'strip' => array(
         '//h2[@class=\'article-title\']',
         '//p[@class=\'article-meta\']',
         '//div[@class=\'copyright\']',
         '//div[@class=\'opinions-of-readers\']',
    ),
);
