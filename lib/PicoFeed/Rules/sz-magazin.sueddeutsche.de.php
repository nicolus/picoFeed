<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://sz-magazin.sueddeutsche.de/texte/anzeigen/37567',
    'body' => array(
         '//div[@class=\'drucken\']',
    ),
    'single_page_link' => array(
         '//a[contains(@href, \'/drucken/\')]',
    ),
    'strip' => array(
         '//h1',
    ),
    'strip_id_or_class' => array(
         'klassifizierung',
         'source',
         'autor',
    ),
);
