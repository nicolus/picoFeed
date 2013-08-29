<?php
return array(
    'title' => '//h1[@data-print=\'title\']',
    'test_url' => 'http://www.buzzfeed.com/hgrant/35-reasons-why-dogs-hate-the-holidays',
    'body' => array(
         '//div[@data-print=\'body\']',
         '//section[@data-print=\'body\']',
    ),
    'strip' => array(
         '*[@data-print=\"ignore\"]',
    ),
);
