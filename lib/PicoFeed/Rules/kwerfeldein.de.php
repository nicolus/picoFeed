<?php
return array(
    'title' => '//div[@class=\'artikel\']/h2',
    'test_url' => 'http://kwerfeldein.de/index.php/2011/10/17/doppelbelichtungen-mit-konzept/',
    'body' => array(
         '//div[@class=\'entry\']',
    ),
    'strip' => array(
         '//p[@class=\'tags\']',
         '//div[@class=\'authorinfo\']',
         '//div[@class=\'authorpic\']',
    ),
);
