<?php
return array(
    'title' => '//h1[@id=\'headline\']',
    'test_url' => 'http://thegreatdiscontent.com/jeffrey-zeldman',
    'body' => array(
         '//article[@class=\'interview\']',
    ),
    'strip' => array(
         '//article[@class=\'interview\']/footer',
    ),
);
