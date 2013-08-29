<?php
return array(
    'title' => '//div[@id=\"habermetni\"]/h1[@id=\"haber_baslik\"]',
    'test_url' => 'http://www.haberler.com/emniyete-atacakti-elinde-patladi-3198733-haberi/',
    'body' => array(
         '//div[@id=\"habermetni\"]/p',
    ),
    'strip' => array(
         '//img[@class=\'newsDetailLeft\']',
    ),
);
