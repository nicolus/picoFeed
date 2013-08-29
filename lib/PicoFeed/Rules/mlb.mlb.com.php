<?php
return array(
    'title' => '//h1[@class=\'article-headline\']',
    'test_url' => 'http://mlb.mlb.com/news/article.jsp?ymd=20120403&content_id=27880830',
    'body' => array(
         '//div[@id=\'article\']',
    ),
    'strip' => array(
         '//div[@id=\'article_head\']',
         '//p[@class=\'tagLine\']',
         '//div[@id=\'article_related_links\']',
         '//div[@id=\'article_related_mlb\']',
         '//span[@class=\'more\']',
         '//div[@class=\'article_component\']',
         '//span[@class=\'screen_reader\']',
         '//ul[@class=\'columnists_blurb\']',
    ),
);
