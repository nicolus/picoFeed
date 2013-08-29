<?php
return array(
    'test_url' => 'http://thisismynext.com/2011/10/18/galaxy-nexus-android-ice-cream-sandwich-pictures-video-hands-on/',
    'body' => array(
         '//div[@class=\'post\']',
    ),
    'strip' => array(
         '//div[@class=\'metaCat\']',
         '//div[@class=\'post\']/h1',
         '//div[@class=\'post\']/div[@class=\'meta clearfix\']',
         '//div[@class=\'post\']/div[@class=\'social-bar clearfix\']',
    ),
);
