<?php
return array(
    'test_url' => 'http://sz.de/1.1556693',
    'single_page_link' => array(
         '//a[ contains( @href, \"/2.220/\" ) ]',
    ),
    'body' => array(
         '//article[@id=\"sitecontent\"]/section[@class=\"body\"]',
    ),
    'strip' => array(
         '//figure[ not( contains(@class, \"zoomimage\" ) ) ]',
         '//div[@data-onlineonly=\"true\"]',
         '//address[@class=\"author\"]',
    ),
);
