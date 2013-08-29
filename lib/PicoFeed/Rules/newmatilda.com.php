<?php
return array(
    'title' => '//div[@id=\"maincontent\"]/h1',
    'test_url' => 'http://newmatilda.com/2011/07/22/turnbull-makes-sense-climate',
    'body' => array(
         '//div[@id=\"maincontent\"]',
    ),
    'strip' => array(
         '//p[@*]',
         '//h1',
         '//div[@id=\"maincontent\"]/div',
    ),
);
