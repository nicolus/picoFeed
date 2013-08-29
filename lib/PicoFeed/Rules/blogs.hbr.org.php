<?php
return array(
    'title' => '//div[@id=\'pageFeature\']/h1',
    'test_url' => 'http://blogs.hbr.org/bregman/2011/04/the-1-killer-of-meetings-and-w.html?utm_source=feedburner&utm_medium=feed&utm_campaign=Feed%3A+harvardbusiness+%28HBR.org%29',
    'body' => array(
         '//div[@id=\'articleBody\']',
    ),
    'strip' => array(
         '//div[@class=\'module wide\']',
    ),
);
