<?php
return array(
    'title' => '//title',
    'test_url' => 'http://www.fertigung.de/2013/04/igus-neuer-energiekettenkatalog/',
    'test_url' => 'http://www.fertigung.de/2013/04/dynamisch-und-hochpraezise/',
    'body' => array(
         '//div[@id=\'content\']',
    ),
    'strip' => array(
         '(//div[@id=\'content\']/h2)[1]',
         '//h2[contains(., \'mehr News\')]/following::*',
         '//h2[contains(., \'mehr News\')]',
         '//div[contains(@class, \'indizar\')]/following::*',
         '//div[contains(@class, \'indizar\')]',
         '//h1[contains(@class, \'single\')]/preceding::*',
         '//h1[contains(@class, \'single\')]',
    ),
    'strip_id_or_class' => array(
         'plista_widget',
    ),
    'next_page_link' => array(
         '//a[contains(., \'Weiter\')]',
    ),
);
