<?php
return array(
    'title' => '//a[@class=\'post_title\']',
    'test_url' => 'http://idlewords.com/2011/08/why_arabic_is_terrific.htm',
    'body' => array(
         '//div[@class=\'entrybox\']',
    ),
    'strip_id_or_class' => array(
         'post_title',
    ),
    'strip' => array(
         '//div[@class=\'entrybox\']/b[1]',
    ),
);
