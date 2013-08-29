<?php
return array(
    'title' => '//h1[@class=\"title\"]',
    'test_url' => 'http://www.standard.co.uk/lifestyle/esmagazine/grace-and-flavour-pizarro-7938350.html',
    'strip' => array(
         '//div[@class=\"innerbyline\"]/a',
         '//p[@class=\"dateline\"]',
    ),
    'body' => array(
         '//div[@class=\"column-2\"]',
    ),
);
