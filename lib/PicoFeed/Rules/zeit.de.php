<?php
return array(
    'title' => '//title',
    'test_url' => 'http://www.zeit.de/kultur/film/2012-12/Kurzfilmtag',
    'single_page_link' => array(
         '//a[@title=\'Druckversion\']',
    ),
    'strip_id_or_class' => array(
         'articleheader',
         '\"informatives\"',
         '\"bottom\"',
         '\"teasermosaic\"',
         '\"comments\"',
         '\"articlefooter af\"',
         '\"relateds\"',
         '\"pagination\"',
    ),
    'strip' => array(
         '//div[@id=\"comments\"] | //div[@class=\"pagination block\"] | //p[@class=\"ressortbacklink\"] | //div[@id=\"relatedArticles\"]  |  // div[@class=\"inline portrait\"]',
         '//ul[@class=\"tools\"]',
         '//p[@class=\"copyright\"]',
         '//div[@class=\"copyright\"]',
         '//div[@class=\"pagination\"]',
    ),
);
