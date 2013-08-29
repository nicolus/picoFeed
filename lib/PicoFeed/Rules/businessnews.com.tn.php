<?php
return array(
    'title' => '//meta[@property=\'og:title\']/@content',
    'test_url' => 'http://www.businessnews.com.tn/details_article.php?a=31073&t=522&lang=fr&temp=1',
    'body' => array(
         '//div[@id=\'article_detail\']',
    ),
    'strip_id_or_class' => array(
         'porte_titre_theme',
         'cont_param',
         'date_com_art',
    ),
);
