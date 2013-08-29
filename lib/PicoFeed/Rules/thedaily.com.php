<?php
return array(
    'title' => '//div[@class=\'story_header\']/h1',
    'test_url' => 'http://www.thedaily.com/page/2012/01/09/010912-news-college-costs-1-5/',
    'body' => array(
         '//div[@id=\'content\']',
    ),
    'strip' => array(
         '//a[@id=\'story_note\']',
         '//br',
         '//div[@class=\'intro\']',
         '//div[@class=\'share-block\']',
         '//div[@class=\'sidebar-social\']',
         '//div[@class=\'top-stories\']',
         '//div[@class=\'prevnext\']',
    ),
);
