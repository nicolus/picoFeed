<?php
return array(
    'title' => '//div[@class=\'story_headline\']',
    'test_url' => 'http://www.post-gazette.com/stories/sports/penguins/pens-crosby-expects-to-return-thursday-226648/',
    'test_url' => 'http://www.post-gazette.com/stories/sports/pirates/pirates-fork-over-changes-for-fans-at-pnc-park-629789',
    'body' => array(
         '//div[@id=\'story\']',
    ),
    'strip' => array(
         '//div[@class=\'story_byline\']',
         '//div[@class=\'story_lastupdate\']',
         '//div[@class=\'story_headline\']',
         '//div[@id=\'abuse\']',
         '//h2',
         '//div[@class=\'pagenumbers_wrap\']',
         '//ul[@class=\'pagenumbers\']',
         '//div[starts-with(., \'To report inappropriate comments\')]',
         '//div[a[@href=\'http://www.post-gazette.com/pg/12062/1213990-42.stm\']]',
         '//ul[@id=\'pikame\']/li[position()>1]',
    ),
    'strip_id_or_class' => array(
         'story_share',
         'OUTBRAIN',
         'story_box_right',
    ),
    'single_page_link' => array(
         '//a[contains(@href, \'?p=0\')]',
    ),
);
