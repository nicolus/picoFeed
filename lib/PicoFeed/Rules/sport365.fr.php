<?php
return array(
    'test_url' => 'http://www.sport365.fr/basketball/nba/new-york-accord-avec-toronto-pour-bargnani-1038773.shtml',
    'test_url' => 'http://www.sport365.fr/rss.xml',
    'body' => array(
         '//h2[contains(@class, \'body_head\')] | //div[@id=\'img_article\' or contains(@class, \'body_content\')]',
         '//div[contains(@class, \'cpanel\')]//div[contains(@class, \'thumbnails\')]',
    ),
    'strip' => array(
         '//div[starts-with(@class, \'actu_\')]',
         '//div[contains(@class, \'data\')]',
    ),
);
