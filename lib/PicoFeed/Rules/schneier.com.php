<?php
return array(
    'test_url' => 'http://www.schneier.com/blog/archives/2010/12/security_in_202.html',
    'body' => array(
         '//div[@class=\'indivbody\']',
    ),
    'strip' => array(
         '//div[@class=\'indivbody\']/h1[1]',
         '//div[@class=\'indivbody\']/p[1]',
         '//div[@class=\'indivbody\']/p[2]',
         '//div[@class=\'indivbody\']/h3[1]',
         '//div[@class=\'indivbody\']/h2[1]',
         '//p[@class=\'posted\']',
    ),
);
