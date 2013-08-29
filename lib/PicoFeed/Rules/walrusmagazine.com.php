<?php
return array(
    'title' => '//div[@id=\'pr\']/h3',
    'test_url' => 'http://www.walrusmagazine.com/articles/2011.12-memoir-kidnapped',
    'body' => array(
         '//div[@id=\'prbody\']',
         '//div[@id=\'pgbody\']',
    ),
    'single_page_link' => array(
         '//div[@class=\'tipjar\']//a[contains(@href, \'/printerFriendly.php?\')]',
    ),
);
