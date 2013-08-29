<?php
return array(
    'title' => '//div[@id=\'center-col\']/h4',
    'test_url' => 'http://www.randsinrepose.com/archives/2012/03/13/hacking_is_important.html',
    'body' => array(
         '//div[@id=\'center-col\']',
    ),
    'strip' => array(
         '//div[@id=\'center-col\']/h4',
         '//div[@class=\'graytext\']',
         '//img[@src=\'http://www.randsinrepose.com/spreader.gif\']',
    ),
);
