<?php
return array(
    'title' => '//meta[@property=\"og:title\"]/@content',
    'title' => '//h1',
    'title' => '//*[@class=\'posttitle\']',
    'test_url' => 'http://www.wired.com/cloudline/2011/10/meet-arms-cortex-a15-the-future-of-the-ipad-and-possibly-the-macbook-air/',
    'test_url' => 'http://www.wired.com/threatlevel/2012/05/ff_counterfeiter/all/1',
    'body' => array(
         '//div[@class=\'entry\']',
    ),
    'strip' => array(
         '//span[contains(@class, \'nextprev\')]',
         '//p[span[contains(@class, \'contentjump\')]]',
         '//text()[contains(., \'nextpage\')]',
    ),
    'single_page_link' => array(
         '//a[contains(@href, \'/all/1\') and contains(@class, \'contentjumpall\')]',
    ),
);
