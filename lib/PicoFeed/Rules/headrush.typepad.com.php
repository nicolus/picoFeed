<?php
return array(
    'title' => '//div[@class=\'content\']/h3[1]',
    'test_url' => 'http://headrush.typepad.com/creating_passionate_users/2005/05/the_case_for_ea.html',
    'body' => array(
         '//div[@class=\'content\']',
    ),
    'strip' => array(
         '//div[@class=\'content\']/p[1]',
         '//h2/following-sibling::p',
         '//h2',
         '//b/p',
         '//div[@class=\'content\']/p[@class=\'posted\']',
    ),
);
