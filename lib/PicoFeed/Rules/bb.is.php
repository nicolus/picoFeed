<?php
return array(
    'test_url' => 'http://bb.is/Pages/82?NewsID=174119',
    'body' => array(
         '//div[@class=\'first-article-big\']',
    ),
    'strip' => array(
         '//table[@class=\'newsimagecontainer\']',
         '//h3[@class=\'headlines\']',
         '//iframe[@class=\'headlines\']',
         '//a[@class=\'newslink\']',
    ),
);
