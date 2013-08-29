<?php
return array(
    'title' => '//h1[@id=\'singlePageTitle\']',
    'test_url' => 'http://www.scienceticker.info/2011/11/24/forscher-finden-gedachtnismolekul/',
    'body' => array(
         '//div[@class=\'post\']',
    ),
    'strip' => array(
         '//div[@class=\'post-ratings\']',
         '//div[@class=\'post-ratings-loading\']',
         '//a[@title=\'Empfehlen Sie den Text weiter!\']',
         '//a[@title=\'Drucken\']',
         '//div[@class=\'share\']',
    ),
);
