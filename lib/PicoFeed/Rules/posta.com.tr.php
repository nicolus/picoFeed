<?php
return array(
    'title' => '//div[@id=\'divAdnetKeyword\']/h1',
    'test_url' => 'http://www.posta.com.tr/yasam/teknoloji/HaberDetay/Fedailer_Istanbul_da.htm?ArticleID=101044',
    'body' => array(
         '//div[@id=\'_middle_content_bottom\']',
    ),
    'strip' => array(
         '//div[@id=\'_middle_content_bottom_child1\']',
         '//div[@id=\'_middle_content_bottom_child4\']',
         '//div[@class=\'cls\']',
         '//div[@class=\'iphoneBox\']',
         '//ul[@class=\'ilgiliHaber\']',
         '//div[@class=\'yorumlar\']',
         '//div[@class=\'kategoriler\']',
         '//div[@class=\'textSize\']',
         '//span[@class=\'tarih\']',
    ),
);
