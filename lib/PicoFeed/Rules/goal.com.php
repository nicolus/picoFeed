<?php
return array(
    'title' => '//div[@id=\'article_headline\']//h1',
    'test_url' => 'http://www.goal.com/en-gb/news/3284/euro-2012/2012/05/31/3139032/video-profile-back-to-his-very-best-for-bayern-frances-flair-and-',
    'test_url' => 'http://www.goal.com/en-gb/news/3284/euro-2012/2012/05/31/3139869/lampard-injury-a-bitter-blow-for-england-and-sorry-way-to#',
    'body' => array(
         '//div[@id=\'article_headline\']/h2 | //div[@id=\'large_article_image\' or @id=\'article_content\']',
    ),
    'strip_id_or_class' => array(
         'relatedLinksBox',
         'betting-widget',
    ),
    'strip' => array(
         '//table[contains(@style, \'float: right; width: 285px;\')]',
         '//div[@class=\'caption\']',
    ),
);
