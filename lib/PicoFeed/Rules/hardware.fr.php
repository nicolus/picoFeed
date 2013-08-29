<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://www.hardware.fr/articles/850-1/pci-express-3-0-impact-performances.html',
    'body' => array(
         '//div[@class=\'content_dossier\']',
    ),
    'strip' => array(
         '//div[@id=\'pagination\']',
    ),
    'next_page_link' => array(
         '//div[@class=\'sommaire_colonne\']//span[@class=\'page_actuelle\']/following::span[@class=\'autres_page\']//a/@href',
    ),
);
