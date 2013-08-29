<?php
return array(
    'title' => '//meta[@name=\'headline\']/@content',
    'test_url' => 'http://www.computerworld.com/s/article/9224348/Apple_s_new_OS_X_tightens_screws_on_some_malware',
    'test_url' => 'http://www.computerworld.com/s/article/9227679/Windows_8_Release_Preview_Updated_but_still_uneasy',
    'body' => array(
         '//div[contains(@class, \'article\')]',
         '//div[@id=\"article_body\"]',
    ),
    'strip_id_or_class' => array(
         'banner',
    ),
    'strip' => array(
         '//noscript',
         '//div[@style=\'width:1px;height:130px;float:right;\']',
         '//div[@class=\'storyby\']',
    ),
    'next_page_link' => array(
         '//div[@id=\"next_page\"]/a',
    ),
    'single_page_link' => array(
         'concat(\'http://www.computerworld.com/s/article/print/\', substring-after(//link[@rel=\'canonical\']/@href, \'/s/article/\'))',
    ),
);
