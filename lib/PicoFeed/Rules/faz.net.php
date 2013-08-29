<?php
return array(
    'title' => '//p[@class=\'Content HeadlineShort\']',
    'test_url' => 'http://www.faz.net/aktuell/feuilleton/zum-tod-von-margaret-thatcher-die-reizfigur-12141919.html#Drucken',
    'body' => array(
         '//div[@class=\'Artikel\']',
    ),
    'strip' => array(
         '//div[@class=\'Breadcrumbs\']',
         '//div[@class=\'QuickSearchBox\']',
         '//div[@class=\'FAZArtikelEinleitung\']',
         '//div[@class=\'FAZArtikelReiter\']',
         '//div[@class=\'clear\']',
         '//span[@class=\'Bildnachweis\']',
         '//img[@class=\'MediaIcon\']',
         '//div[@class=\'ArtikelMediaLink\']',
         '//div[@class=\'ArtikelAbbinder\']',
         '//div[@class=\'ArtikelKommentieren Artikelfuss GETS;tk;boxen.top-lesermeinungen;tp;content\']',
         '//div[@class=\'FAZArtikelKommentare FAZArtikelContent\']',
         '//div[@class=\'FAZArtikelFunktionen\']',
         '//div[@id=\'FAZContentRight\']',
    ),
);
