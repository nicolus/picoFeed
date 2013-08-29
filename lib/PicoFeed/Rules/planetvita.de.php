<?php
return array(
    'title' => '//div[@id=\'frnRahmen\']/div/div[@id=\'content\']/div[2]/h2',
    'test_url' => 'http://www.planetvita.de/news/10389-psn-store-update-vom-03-april-neue-inhalte-fuer-psvita.html',
    'body' => array(
         '//div[@id=\'content\']/div[2]/span',
    ),
    'strip' => array(
         '//div[@id=\'commenthead\']',
    ),
);
