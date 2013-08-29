<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://www.fastcompany.com/3000226/link-between-quietness-and-productivity',
    'test_url' => 'http://www.fastcompany.com/3003586/6-simple-rituals-reach-your-potential-every-day',
    'body' => array(
         '//figure[@class=\'node-poster\'] | //div[contains(@class, \"node-content\")]',
    ),
    'strip_id_or_class' => array(
         'article-top-wrapper',
         'footer-message',
         'print-logo',
         'skipnav',
    ),
    'strip' => array(
         '//cite',
         '//*[@class=\'timestamp\']',
         '//div[@id=\'page_right\']',
         '//section[@id=\'header_region\']',
         '//h1[@class=\'node-title\']',
         '//div[@class=\'node-submitted\']',
    ),
);
