<?php
return array(
    'title' => '//span[@class=\'hcf-headline\']',
    'test_url' => 'http://www.handelsblatt.com/meinung/gastbeitraege/gastkommentar-zum-emissionshandel-kurskorrekturen-fuehren-zum-kentern/8044326.html',
    'single_page_link' => array(
         '//li[contains(@class,\"hcf-print\")]/a',
    ),
    'body' => array(
         '//div[@class=\'article\']',
    ),
    'strip' => array(
         '//div[contains(@class,\"hcf-smartbox\")]',
         '//div[contains(@class,\"hcf-stopper\")]',
         '//div[contains(@class,\"hcf-img-controls\")]',
         '//span[@class=\'hcf-location-mark\']',
         '//span[@class=\'hcf-copyright\']',
         '//div[@class=\'hcf-copyright\']',
         '//div[@class=\'hcf-origin\']',
    ),
);
