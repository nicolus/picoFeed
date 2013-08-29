<?php
return array(
    'title' => '//div[@id=\'artikelHeader\']/h1',
    'test_url' => 'http://derstandard.at/1318726018343/Breitband-LTE-Was-bringt-die-neue-Mobilfunk-Generation',
    'body' => array(
         '//div[@class=\'copytext\']',
    ),
    'strip' => array(
         '//ul[@class=\'lookupLinksArtikel\']',
         '//div[@id=\'pageTop\']',
         '//div[@id=\'toolbar\']',
         '//div[@id=\'articleTools\']',
         '//div[@id=\'weiterlesen\']',
         '//div[@id=\'communityCanvas\']',
    ),
);
