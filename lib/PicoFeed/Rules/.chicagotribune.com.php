<?php
return array(
    'test_url' => 'http://www.chicagotribune.com/classified/automotive/used/chi-auto-refinance-pros-cons-20130513,0,4116070.story',
    'body' => array(
         '//div[@id=\'area-article-first-block\'] | //div[@id=\'mod-a-body-after-first-para\']',
    ),
    'strip_id_or_class' => array(
         'byline',
    ),
    'strip' => array(
         '//div[@id=\'mod-article-byline\']',
    ),
);
