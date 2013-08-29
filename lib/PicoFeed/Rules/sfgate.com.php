<?php
return array(
    'title' => '/html/head/title',
    'test_url' => 'http://www.sfgate.com/columnists/garchik/',
    'body' => array(
         '//div[@id = \'articlecontent\']/div[contains(@class, \'bodytext\')]',
         '//div[@class = \'blogitem\']',
    ),
    'strip' => array(
         '//div[div[contains(@class, \'imgbox\')]]',
    ),
);
