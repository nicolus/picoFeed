<?php
return array(
    'title' => '//div[@id=\'article\']//div[contains(@class, \'content\')]/h1',
    'test_url' => 'http://kvp.expressen.se/nyheter/1.2575726/kvinna-misstankt-for-angelholmsmord',
    'body' => array(
         '//div[@id=\'article\']',
    ),
    'strip' => array(
         '//div[@class=\'art-right\']',
         '//img[contains(@src, \'img/px.gif\')]',
    ),
);
