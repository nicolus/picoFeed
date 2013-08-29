<?php
return array(
    'title' => '//div[@class=\'singlepost\']/h1',
    'test_url' => 'http://futurezone.at/future/5502-erste-galileo-satelliten-starten-ins-all.php',
    'strip' => array(
         '//div[@class=\'postsidebar\']',
         '//div[@class=\'gallery\']',
         '//div[@class=\'biggallery\']',
         '//ul[@class=\'social\']',
         '//ul[@class=\'social_mail\']',
    ),
    'body' => array(
         '//div[@class=\'singlepost\']',
    ),
);
