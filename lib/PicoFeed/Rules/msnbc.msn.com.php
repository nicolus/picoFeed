<?php
return array(
    'title' => '//title',
    'test_url' => 'http://www.msnbc.msn.com/id/44748412/ns/business-world_business/#.TolUv-vfDbE',
    'body' => array(
         '//div[@id=\'intellitTXT\']',
    ),
    'strip' => array(
         '//div[@id=\'byline\']',
         '//div[contains(@class,\'timestamp\')]',
         '//div[contains(@class, \'ad-label\')]',
         '//div[contains(@class, \'ad-break\')]',
         '//span[contains(@class, \'x-video\')]',
         '//span[contains(@class, \'inline\')]',
         '//div[contains(@class, \'video\')]',
         '//div[contains(@class, \'discuss\')]',
         '//div[@id=\'most-popular\']',
         '//div[contains(@class,\'drawer\')]',
         '//*[contains(@class, \'hide\')]',
    ),
);
