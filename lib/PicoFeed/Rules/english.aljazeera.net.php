<?php
return array(
    'title' => '//span[@id=\'DetailedTitle\']',
    'test_url' => 'http://english.aljazeera.net//news/middleeast/2011/04/20114681444376835.html',
    'body' => array(
         '//div[@id=\'ctl00_cphBody_dvArticleInfoBlock\'] | //td[@class=\'DetailedSummary\']',
    ),
    'strip_id_or_class' => array(
         'sidebar',
         'Skyscrapper_Body',
    ),
    'strip' => array(
         '//td[@class=\'DetailedSummary\']/table[position() != 1]',
    ),
);
