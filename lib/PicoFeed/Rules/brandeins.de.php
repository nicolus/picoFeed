<?php
return array(
    'title' => '//div[@id=\'theContent\']/h3',
    'test_url' => 'http://www.brandeins.de/archiv/magazin/gegessen-wird-immer/artikel/hunger.html',
    'body' => array(
         '//div[@id=\'theContent\']',
    ),
    'strip' => array(
         '//div[@id=\'theContent\']/h3',
    ),
);
