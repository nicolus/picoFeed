<?php
return array(
    'title' => '//div[@class=\'qp_headline\']/h1',
    'test_url' => 'http://apolda.thueringer-allgemeine.de/web/apolda/startseite/detail/-/specific/Neue-Superknolle-beim-Heichelheimer-Kartoffelfest-praemiert-447764498',
    'body' => array(
         '//div[contains(@class, \'article\')]//div[@class=\'qp_text\']',
    ),
    'strip' => array(
         '//div[@id=\'_DetailPortlet_WAR_queport_zgtperson\']',
         '//div[@class=\'qp_embedded\']',
    ),
);
