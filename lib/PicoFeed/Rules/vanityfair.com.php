<?php
return array(
    'title' => '//meta[@property=\"og:title\"]/@content',
    'test_url' => 'http://www.vanityfair.com/politics/features/2011/05/egypt-revolutionaries-201105',
    'test_url' => 'http://www.vanityfair.com/politics/features/2008/08/hitchens200808',
    'test_url' => 'http://www.vanityfair.com/style/2012/01/prisoners-of-style-201201',
    'body' => array(
         '//div[contains(@class, \'pageContainers\')]',
         '//article[@id=\'items-container\']',
    ),
    'strip_id_or_class' => array(
         'bc',
         'utilities',
         'list-supporting',
         'yrail',
         'urail',
         'super-rubric-section',
         'cn_date_time',
         'cn_contributors',
         'cn_pagination_controls',
         'cn_features_container',
         'global-footer',
         'cn_ecom_placement',
    ),
    'strip' => array(
         '//li[@class=\'blogNavPrev\']',
    ),
    'single_page_link' => array(
         '//a[@title=\'Print this page\']',
    ),
);
