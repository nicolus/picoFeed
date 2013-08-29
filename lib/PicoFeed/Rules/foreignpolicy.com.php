<?php
return array(
    'title' => '//div[@class=\'translateHead\']//h1 | //div[@id=\'art-mast\']//h1',
    'test_url' => 'http://www.foreignpolicy.com/articles/2011/08/01/a_murderers_manifesto_and_me',
    'test_url' => 'http://www.foreignpolicy.com/articles/2012/02/29/five_years_in_damascus',
    'body' => array(
         '//div[@id=\'art-mast\']/h2 | //div[@class=\'translateBody\'] | //div[@id=\'art-body\']',
    ),
    'strip' => array(
         '//div[@id=\'share-box\']',
         '//div[@id=\'special-box\']',
    ),
    'single_page_link' => array(
         '//span[@id=\'controls\']/a[contains(@href, \'print=yes\')]',
         '//a[text()=\'SINGLE PAGE\']',
    ),
);
