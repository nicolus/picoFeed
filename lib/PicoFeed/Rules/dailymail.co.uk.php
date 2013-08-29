<?php
return array(
    'test_url' => 'http://www.dailymail.co.uk/news/article-1375423/Royal-wedding-Texan-billionaire-Joe-Albritton-invited-Prince-Charles.html',
    'body' => array(
         '//div[@id=\'js-article-text\']',
    ),
    'strip' => array(
         '//div[@class=\'explore-links\']',
         '//div[@id=\'js-article-text\']/br[position()=1]',
    ),
    'strip_id_or_class' => array(
         'print-or-mail-links',
         'shareArticles',
         'googleAds',
         'digg-button',
         'article-icon-links-container',
         'clickToEnlarge',
    ),
);
