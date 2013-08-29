<?php
return array(
    'title' => '//h1[@id=\'firstHeading\' or @class=\'firstHeading\']',
    'test_url' => 'http://wikitravel.org/wiki/en/index.php?title=Bangkok&printable=yes',
    'body' => array(
         '//div[@id = \'bodyContent\']',
    ),
    'strip_id_or_class' => array(
         'editsection',
         'vertical-navbox',
    ),
    'strip' => array(
         '//table[@id=\'toc\'] | //div[@id=\'p-toc\']',
         '//div[@id=\'catlinks\' or @id=\'contentSub\']',
         '//div[@id=\'jump-to-nav\']',
         '//div[@class=\'thumbcaption\']//div[@class=\'magnify\']',
         '//table[@class=\'navbox\']',
    ),
);
