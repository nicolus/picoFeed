<?php
return array(
    'title' => '//div[@id=\'singletext\']//h1',
    'test_url' => 'http://www.viply.de/?p=87973',
    'test_url' => 'http://www.viply.de/?feed=rss2',
    'body' => array(
         '//div[contains(@class, \'mypictureborder\')] | //div[@id=\'singletext\']',
    ),
    'strip_id_or_class' => array(
         'singletostart',
         'navigation',
         'social',
         'single_topwrapper',
    ),
    'strip' => array(
         '//a[contains(., \'Nächster Artikel\')]',
    ),
);
