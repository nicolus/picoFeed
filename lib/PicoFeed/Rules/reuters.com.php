<?php
return array(
    'title' => '//h1[@class=\'headline3\']',
    'test_url' => 'http://www.reuters.com/article/2011/04/08/us-ivorycoast-killings-idUSTRE73732A20110408',
    'body' => array(
         '//div[@id=\'articleImage\' or @id=\'frame_fd1fade\'] | //span[@id=\'articleText\'] | //div[@class=\'pageNavigation\']',
    ),
    'strip' => array(
         '//li[@class=\'next\']',
         '//span[@class=\'articleLocation\']',
    ),
);
