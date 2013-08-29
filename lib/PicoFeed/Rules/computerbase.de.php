<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://www.computerbase.de/news/2012-06/verbraucherzentrale-mahnt-blizzard-fuer-diablo-3-ab/',
    'body' => array(
         '//*[@id=\"main\"]/div[1]',
    ),
    'strip' => array(
         '//*[@id=\"main\"]/div[2]',
         '//*[@id=\"main\"]/div[3]',
         '//*[@id=\"page\"]//footer',
         '//img',
         '//figure | //figcaption',
    ),
);
