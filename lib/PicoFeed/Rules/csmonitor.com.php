<?php
return array(
    'title' => '//h1[contains(@class, \'head\')]',
    'test_url' => 'www.csmonitor.com/World/Middle-East/2011/1108/Imminent-Iran-nuclear-threat-A-timeline-of-warnings-since-1979/Earliest-warnings-1979-84',
    'body' => array(
         '//div[@id=\'mainColumn\']//div[contains(@class, \'list-article-full\')]',
         '//div[@id=\'mainColumn\']',
    ),
    'single_page_link' => array(
         '//div[@class=\'storyToolbar\']//a[contains(@href, \'/print/\')]',
    ),
    'strip_id_or_class' => array(
         'storyToolbar',
         'promotion-tag',
    ),
);
