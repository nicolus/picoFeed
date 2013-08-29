<?php
return array(
    'title' => '//h1[@class=\'producttabbed-title\']',
    'test_url' => 'http://www.cardboardconnection.com/2012-topps-archives-baseball-cards',
    'body' => array(
         '//div[@class=\'postTabs_divs postTabs_curr_div\']',
    ),
    'strip' => array(
         '//div[@class=\'ratingblock2\']',
         '//p[@id=\'breadcrumbs\']',
         '//div[@style=\'display: none\']',
    ),
);
