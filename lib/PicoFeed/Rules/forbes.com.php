<?php
return array(
    'title' => '//hgroup//h1',
    'title' => '//span[@class=\'mainarttitle\']',
    'test_url' => 'http://www.forbes.com/forbes/2011/0509/technology-frog-design-jan-chipchase-ethnographer-birth-cool_print.html',
    'test_url' => 'http://www.forbes.com/sites/bruceupbin/2012/09/11/the-iphone-5-winners-and-losers/',
    'body' => array(
         '//div[@id=\'leftRail\']//div[contains(@class, \'body\')]',
    ),
    'strip' => array(
         '//aside',
    ),
    'strip_id_or_class' => array(
         'sticky_sharing',
         'pagination',
         'controlsbox',
         'storyboxes',
         'sponsoredlinks',
         'nextpage',
         'contextuallinks',
         'article_actions',
         'engagement_block',
    ),
    'single_page_link' => array(
         '//a[contains(@href, \'/print/\')]',
    ),
);
