<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://www.newsmill.se/artikel/2012/05/06/medielogiken-v-ger-tyngre-n-reportrarnas-sikter',
    'body' => array(
         '(//div[@class=\'articleImg\']//img)[1] | //p[contains(@class, \'commentTextArticle\') or contains(@class, \'articlePublished\')] | //div[@id=\'articleLeftContent\']',
    ),
    'strip_id_or_class' => array(
         'facts',
         'articleBlogsHolder',
         'byline',
    ),
);
