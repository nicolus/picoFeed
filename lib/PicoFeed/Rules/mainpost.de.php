<?php
return array(
    'title' => 'substring-before(//title, \'|\')',
    'test_url' => 'http://www.mainpost.de/ueberregional/meinung/Dioxin-Skandal-bringt-Agrarministerin-in-Bedraengnis;art9517,5920211',
    'body' => array(
         '//*[@id=\'content-left\']',
    ),
    'strip_id_or_class' => array(
         '\'subHead\'',
         '\'fl_right\'',
         '\'infolink\'',
         '\'content-head\'',
         '\'tab\'',
         '\'tab-active\'',
         '\'font16\'',
         '\'leftimage\'',
         '\'rightimage\'',
    ),
    'strip' => array(
         '//*[contains(@class,\'trenner\')]',
         '//h1/*',
         '//table',
         '//p/following-sibling::*[0]',
    ),
);
