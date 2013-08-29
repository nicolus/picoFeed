<?php
return array(
    'title' => 'h1',
    'test_url' => 'http://wyborcza.pl/1,123455,11536088,Gdy_peknie_fejs__obryzga_wszystko.html?as=1&startsz=x',
    'body' => array(
         '//*[@id = \'art\']',
    ),
    'next_page_link' => array(
         '//*[@id=\'Str\']/a[contains(text(), \'nastepne\')]',
    ),
    'strip' => array(
         '//*[@class = \'rel_zdjTOP\']',
         '//*[@id = \'rel\']',
         '//*[@class = \'txt_upl\']',
         '//*[@id=\'Str\']',
         '//*[@id=\'source\']',
    ),
);
