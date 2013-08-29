<?php
return array(
    'title' => '//div[@class=\'story\']/h1',
    'test_url' => 'http://www.techdirt.com/articles/20120112/17455117394/sega-gets-it-right-about-sopa-its-time-hard-reset-copyright-law-congress.shtml',
    'body' => array(
         '//div[@class=\'story\']',
    ),
    'strip' => array(
         '//div[@class=\'story\']/h1',
         '//p[a[contains(., \'Leave a Comment\')]]',
    ),
    'strip_id_or_class' => array(
         'share',
         'maincolumn_head',
         'maincolmod',
    ),
);
