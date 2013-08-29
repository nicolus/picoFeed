<?php
return array(
    'title' => '//h1[@id=\'firstHeading\']',
    'test_url' => 'https://secure.wikimedia.org/wikipedia/en/wiki/Christopher_Lloyd',
    'body' => array(
         '//div[@id = \'bodyContent\']',
    ),
    'strip_id_or_class' => array(
         'editsection',
         'toc',
         'vertical-navbox',
    ),
    'strip' => array(
         '//div[@id=\'catlinks\']',
         '//div[@id=\'jump-to-nav\']',
         '//div[@class=\'thumbcaption\']//div[@class=\'magnify\']',
         '//table[@class=\'navbox\']',
    ),
);
