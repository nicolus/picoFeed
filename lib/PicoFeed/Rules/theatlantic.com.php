<?php
return array(
    'title' => '//div[@id=\'article\']/h1',
    'title' => '//h1',
    'test_url' => 'http://www.theatlantic.com/technology/archive/2011/04/want-to-see-how-crazy-a-bot-run-market-can-be/237773/',
    'test_url' => 'http://www.theatlantic.com/magazine/archive/2007/11/the-autumn-of-the-multitaskers/6342/',
    'test_url' => 'http://www.theatlantic.com/entertainment/archive/2012/04/30-rock-live-a-funny-reminder-of-why-sitcoms-arent-shot-live-anymore/256447/',
    'body' => array(
         '//div[@class=\'articleText\']',
         '//div[@class=\'articleContent\']',
         '//div[@id=\'article\']',
    ),
    'strip' => array(
         '//div[@class=\'moreOnBoxWithImages\']',
         '//p[contains(., \'This article available online at:\')]',
         '//p[contains(., \'This article available online at:\')]/following::*',
         '//div[@class=\'earthbox\']',
    ),
    'single_page_link' => array(
         '//a[@class=\'print\']',
    ),
);
