<?php
return array(
    'test_url' => 'http://on.net.mk/video/na-trkala/lamborghini-aventador-avionot-shto-ne-leta',
    'body' => array(
         '//div[(@class = \"statija\")]',
    ),
    'strip' => array(
         '//div[(@class = \"relatedBlock\")]',
         '//div[(@class = \"swftools\")]',
         '//table[(@class = \"links\")]',
    ),
);
