<?php
return array(
    'title' => '//*[contains(@class,\'post-title\')]',
    'test_url' => 'http://www.pathawks.com/2011/06/crazyawesomecoloradotrip.html',
    'body' => array(
         '//div[contains(@class,\'post-body\')]',
         '//div[contains(@class,\'entry-content\')]',
    ),
);
