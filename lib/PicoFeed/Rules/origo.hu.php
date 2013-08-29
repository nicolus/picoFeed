<?php
return array(
    'title' => '/html/body/div[5]/div[2]/h1',
    'test_url' => 'http://www.origo.hu/itthon/20110119-lemondott-a-kulturaert-felelos-helyettes-allamtitkar.html',
    'body' => array(
         '/html/body/div[5]/div[2]/div[6]/div/div',
         '//*[@id=\"cikk\"]',
    ),
    'strip' => array(
         '/html/body/div[5]/div[2]/h1',
         '/html/body/div[5]/div[2]/div[4]',
         '//*[@id=\"multidoboz\"]',
         '/html/body/div[5]/div[2]/div[6]/div[2]',
         '//*[@id=\"comments\"]',
         '//*[@id=\"rating-doboz\"]',
         '/html/body/div[5]/div[2]/div[10]',
         '/html/body/div[5]/div[2]/a',
         '/html/body/div[5]/div[2]/span',
         '/html/body/div[5]/div[2]/span[2]',
         '/html/body/div[5]/div[2]/span[3]',
         '/html/body/div[5]/div[2]/span[4]',
         '/html/body/div[5]/div[2]/span[5]',
         '//*[@id=\"kommentszam\"]',
    ),
);
