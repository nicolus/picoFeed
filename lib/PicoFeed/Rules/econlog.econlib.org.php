<?php
return array(
    'title' => '//h1[@class=\"title\"]',
    'test_url' => 'http://econlog.econlib.org/archives/2012/04/blinder_on_heal.html',
    'strip' => array(
         '//a[@class=\"top\" and @href=\"#\"]',
    ),
);
