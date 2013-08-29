<?php
return array(
    'title' => '//div[@id=\'contentheader\']/h1',
    'test_url' => 'http://www.brookings.edu/opinions/2011/1018_cyberattack_libya_goldsmith.aspx',
    'body' => array(
         '//div[@class=\'main-content\']',
    ),
    'strip' => array(
         '//p[@class=\'byline\']',
         '//div[@class=\'img-gallery\']',
         '//div[@class=\'callout\']',
         '//div[@class=\'add-your-view\']',
    ),
);
