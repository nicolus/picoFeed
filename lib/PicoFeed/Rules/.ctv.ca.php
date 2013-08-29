<?php
return array(
    'title' => '//h3[@class=\'jhl\']',
    'test_url' => 'http://montreal.ctv.ca/servlet/an/local/CTVNews/20110914/mtl_construction_110914/20110915?hub=MontrealHome',
    'body' => array(
         '//div[@class=\'storyBody\']',
    ),
    'strip' => array(
         '//p[contains(., \'Please Add Comments\')]//following-sibling::*',
         '//p[contains(., \'Please Add Comments\')]',
         '//p[em[contains(., \'This story has been updated from its original version\')]]',
         '//hr',
    ),
);
