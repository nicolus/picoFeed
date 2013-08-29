<?php
return array(
    'title' => 'substring-before(//title,\'pirates.com\')',
    'test_url' => 'http://pittsburgh.pirates.mlb.com/news/article.jsp?ymd=20120330&content_id=27759040&vkey=news_pit&c_id=pit',
    'body' => array(
         '//div[@id=\'article\']',
    ),
    'strip' => array(
         '//div[@id=\'article_head\']',
         '//p[@class=\'tagLine\']',
         '//div[@id=\'article_related_links\']',
         '//div[@id=\'article_related_mlb\']',
         '//div[@id=\'article_related_club\']',
         '//span[@class=\'more\']',
         '//div[@class=\'article_component\']',
         '//span[@class=\'screen_reader\']',
         '//ul[@class=\'columnists_blurb\']',
    ),
);
