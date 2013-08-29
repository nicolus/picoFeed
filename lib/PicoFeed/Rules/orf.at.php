<?php
return array(
    'title' => '//div[@class=\'hidden offscreen\']/h2',
    'test_url' => 'http://orf.at/stories/2084731/',
    'single_page_link' => array(
         '//div[@id=\'content\']//p[@class=\'readMore\']/a',
    ),
    'body' => array(
         '//div[@id=\"storyText\"]',
    ),
    'strip' => array(
         '//small[@class=\'credit\']',
         '//small[@class=\'caption\']',
         '//p[@class=\'toplink\']',
    ),
);
