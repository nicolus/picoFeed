<?php
return array(
    'title' => '//h1[1]',
    'test_url' => 'http://www.tagesschau.de/ausland/wahlkampffrankreich102.html',
    'body' => array(
         '//div[contains(@class, \'article\')] | //div[contains(@class, \'centerCol\')]',
    ),
    'strip' => array(
         '//h1[1]',
         '//div[contains(@class, \'directLinks\')]',
         '//div[contains(@class, \'zitatBox\')]',
         '//div[contains(@class, \'teaserBox metaBlock\')]',
         '//*[contains(@class, \'inv\')]',
         '//span[@class=\'imgSubline\']',
         '//*[contains(@class, \'topline\')][1]',
         '//div[@id=\'rightCol\'][1]',
         '//div[@id=\"footer\"][1]',
         '//div[@class=\"fPlayer\"]',
         '//div[@id=\'seitenanfang\']',
         '//div[@class=\'standDatum\']',
         '//em',
    ),
);
