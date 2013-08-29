<?php
return array(
    'title' => '//div[@class=\'content\']/h3',
    'test_url' => 'http://www.3quarksdaily.com/3quarksdaily/2012/01/martin-luther-king-i-have-a-dream.html',
    'body' => array(
         '//div[@class=\'content\']',
    ),
    'strip' => array(
         '//div[@class=\'content\']/h2',
         '//div[@id=\'postmenu\']',
         '//div[@class=\'trackback\']',
    ),
);
