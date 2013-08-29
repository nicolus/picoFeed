<?php
return array(
    'test_url' => 'http://www.gatopardo.com/ReportajesGP.php?R=95',
    'body' => array(
         '//div[@class=\'panel\']',
    ),
    'strip' => array(
         '//div[@style=\'float:right\']',
         '//span[@class=\'titulosHomePublicidad\']',
         '//div[@id=\'TitTop5Der\']',
         '//img[@src=\'/ImagesGatoPardo/LogoGatopardo.png\']',
    ),
);
