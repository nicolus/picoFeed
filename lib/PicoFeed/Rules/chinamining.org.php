<?php
return array(
    'title' => '//*[@id=\'Content\']/span[1]',
    'test_url' => 'http://www.chinamining.org/News/2011-07-22/1311319069d48087.html',
    'strip' => array(
         '//*[@id=\'Content\']/span[1]',
         '//*[@id=\'Content\']/span[2]',
    ),
    'body' => array(
         '//*[@id=\'Content\']',
    ),
);
