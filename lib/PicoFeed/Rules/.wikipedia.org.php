<?php
return array(
    'title' => '//h1[@id=\'firstHeading\']',
    'test_url' => 'http://en.wikipedia.org/wiki/Christopher_Lloyd',
    'body' => array(
         '//div[@id = \'bodyContent\']',
    ),
    'strip_id_or_class' => array(
         'editsection',
         'vertical-navbox',
    ),
    'strip' => array(
         '//table[@id=\'toc\']',
         '//div[@id=\'catlinks\']',
         '//div[@id=\'jump-to-nav\']',
         '//div[@class=\'thumbcaption\']//div[@class=\'magnify\']',
         '//table[@class=\'navbox\']',
         '//table[contains(@class, \'infobox\')]',
         '//div[@class=\'dablink\']',
         '//div[@id=\'contentSub\']',
         '//table[contains(@class, \'metadata\')]',
         '//*[contains(@class, \'noprint\')]',
         '//span[@title=\'pronunciation:\']',
    ),
);
