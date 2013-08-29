<?php
return array(
    'test_url' => 'http://www.latimes.com/news/opinion/commentary/la-oe-gartonash-wilders-20110512,0,2876761.story',
    'strip' => array(
         '//div[@id=\"tugs_story_display\"]',
         '//div[@id=\"search_overlay\"]',
         '//div[@id=\"adv_search\"]',
         '//p[starts-with(., \'latimes.com\')]',
         '//h1[starts-with(., \'latimes.com\')]',
    ),
    'body' => array(
         '//div[@class=\'story\']',
    ),
    'single_page_link' => array(
         '//a[contains(@href, \',print.\')]',
    ),
    'strip_id_or_class' => array(
         'cubead',
    ),
);
