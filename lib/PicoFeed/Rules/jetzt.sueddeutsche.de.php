<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://jetzt.sueddeutsche.de/texte/anzeigen/544308/Alles-flicken',
    'body' => array(
         '//div[@class=\'content\']/div[contains(@class, \'text\')]',
    ),
    'next_page_link' => array(
         '//div[contains(@class, \'text\')]/div/div[contains(@class, \'paging\')]/a[@class=\'more \']',
    ),
    'strip' => array(
         '//h1',
    ),
    'strip_id_or_class' => array(
         'meta',
         'author',
         'paging',
    ),
);
