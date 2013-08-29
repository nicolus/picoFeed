<?php
return array(
    'test_url' => 'http://www.historytoday.com/carol-dyhouse/skin-deep-fall-fur',
    'body' => array(
         '//div[@id = \'content\']',
    ),
    'strip' => array(
         '//div[contains(@class, \'region-ubercontent\')]',
         '//h1',
         '//div[@id = \'ht-author\']',
         '//ul[@class = \'links inline\']',
         '//div[@id = \'ht-tools\']',
    ),
);
