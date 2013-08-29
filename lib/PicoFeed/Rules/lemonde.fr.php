<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://www.lemonde.fr/economie/article/2011/07/05/moody-s-abaisse-la-note-du-portugal-de-quatre-crans_1545237_3234.html',
    'body' => array(
         '//div[@class=\'contenu_article\']',
    ),
    'strip' => array(
         '//a[contains(@class, \'listLink\')]',
    ),
);
