<?php
return array(
    'title' => '//div[@class=\'title\']/h1',
    'test_url' => 'http://www.scienceblogs.de/astrodicticum-simplex/2011/10/weltuntergang-reloaded-das-jungste-gericht-findet-am-21-oktober-statt.php',
    'single_page_link' => array(
         '//div[@class=\'c2c1\']/div[@class=\'toptheme further line\']//ul//li/a',
    ),
    'body' => array(
         '//div[@class=\'title\']',
    ),
    'strip' => array(
         '//p[@class=\'entrypagination\']',
         '//p[@class=\'details_top\']',
         '//p[@class=\'details\']',
         '//p[@class=\'details_bottom\']',
    ),
);
