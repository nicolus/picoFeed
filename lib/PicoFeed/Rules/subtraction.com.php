<?php
return array(
    'title' => '//*[@id=\'posts\']/div[1]/h2',
    'test_url' => 'http://www.subtraction.com/2011/02/01/unnecessary-explanations',
    'body' => array(
         '//div[@class=\'body-lead\']',
    ),
    'strip' => array(
         '//div[@class=\'body-lead\']/div[@class=\'info-label\']',
    ),
);
