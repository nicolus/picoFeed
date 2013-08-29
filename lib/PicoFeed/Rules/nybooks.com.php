<?php
return array(
    'title' => '//div[@id=\'page-title-wrapper\']/div[@id=\'page-title\']/h2',
    'test_url' => 'http://www.nybooks.com/articles/archives/2012/feb/23/were-more-unequal-you-think/',
    'strip_id_or_class' => array(
         'sIFR-alternate',
         'article-tools',
         'js_target',
         'marker',
    ),
    'single_page_link' => array(
         '//a[contains(@href, \'pagination=false\') and not(contains(@href, \'printpage=true\'))]',
    ),
    'body' => array(
         '//div[@id = \'article-body\']',
    ),
);
