<?php
return array(
    'test_url' => 'http://www.anandtech.com/show/5812/eurocom-monster-10-clevos-little-monster/',
    'strip' => array(
         '//h2[. = \'Page 1\']/preceding::p',
         '//h2',
    ),
    'single_page_link' => array(
         'concat(\'http://www.anandtech.com/print/\', substring-after(//meta[@property=\'og:url\']/@content, \'/show/\'))',
    ),
);
