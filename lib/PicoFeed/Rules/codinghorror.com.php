<?php
return array(
    'test_url' => 'http://www.codinghorror.com/blog/2011/07/building-a-pc-part-vii-rebooting.html',
    'body' => array(
         '//div[@class=\'blogbody\']',
    ),
    'strip' => array(
         '//h3[@class=\'title\']',
         '//div[@class=\'posted\']/following-sibling::*',
         '//div[@class=\'posted\']',
    ),
);
