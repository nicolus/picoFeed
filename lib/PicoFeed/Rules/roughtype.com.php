<?php
return array(
    'test_url' => 'http://www.roughtype.com/archives/2012/01/power_to_the_da.php',
    'body' => array(
         '//div[@class=\'content\']',
    ),
    'strip' => array(
         '//p[@class=\'postmeta\']/following::*',
         '//p[@class=\'postmeta\']',
         '//p[@align=\'left\']',
    ),
);
