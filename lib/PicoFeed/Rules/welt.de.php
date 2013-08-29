<?php
return array(
    'test_url' => 'http://www.welt.de/vermischtes/weltgeschehen/article11050589/27-Bergleute-in-neuseelaendischer-Mine-vermisst.html',
    'body' => array(
         '//div[contains(@class, \'articleContent\')]',
    ),
    'strip' => array(
         '//div[@class=\'advertising\']',
         '//div[@class=\'themenalarm\']',
         '//div[contains(@class, \'inTextTeaser\')]',
         '//span[@class=\'copyRight\']',
         '//div[contains(@class, \'textGallery\')]',
         '//div[contains(@class, \'videoGallery\')]',
         '//div[contains(@class, \'imageGallery\')]',
         '//div[contains(@class, \'openContent\')]',
         '//div[@id = \'writeComment\']',
    ),
);
