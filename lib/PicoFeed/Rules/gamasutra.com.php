<?php
return array(
    'title' => '//span[@class=\'newsTitle\']',
    'title' => '//h3[@class=\'title\']',
    'test_url' => 'http://www.gamasutra.com/view/feature/132559/staying_power_rethinking_feedback_.php',
    'body' => array(
         '//td[@class=\'featureText\']',
         '//td[@class=\'newsText\']',
    ),
    'strip' => array(
         '//h3[@class=\'title\']',
    ),
    'single_page_link' => array(
         '//a[contains(@href, \'?print=1\')]',
    ),
);
