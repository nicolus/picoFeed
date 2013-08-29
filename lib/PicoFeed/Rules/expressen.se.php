<?php
return array(
    'title' => '//div[@id=\'article\']/div[contains(@class, \'content\')]/h1',
    'test_url' => 'http://www.expressen.se/kultur/1.2683904/medan-natet-dras-at',
    'body' => array(
         '//div[@id=\'article\']/div[contains(@class, \'content\')]',
    ),
    'strip' => array(
         '//img[contains(@src, \'img/px.gif\')]',
         '//div[@id=\'article\']/div[contains(@class, \'content\')]/div[contains(@class, \'art-right\')]',
    ),
);
