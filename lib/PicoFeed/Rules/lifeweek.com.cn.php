<?php
return array(
    'title' => 'substring-before(//h1, \'（\')',
    'title' => '//h1',
    'test_url' => 'http://www.lifeweek.com.cn/2013/0308/40213.shtml',
    'next_page_link' => array(
         '//div[@class=\'pageturn_list\']/a[@class=\'pagedown\']',
    ),
    'body' => array(
         '//div[@class=\'original \']',
    ),
    'strip' => array(
         '//h1',
         '//ul[@class=\'authorbox\']',
         '//span[@class=\'app_p\']',
         '//div[@style=\'text-align:right;\']',
         '//div[@class=\'pageturn_list\']',
         '//div[@class=\'lifespeaks\']',
         '//div[@class=\'vright fr\']',
         '//div[@class=\'copyrt mg20\']',
         '//div[@class=\'keyabout mg20\']',
         '//ul[@class=\'readabout mg20\']',
    ),
);
