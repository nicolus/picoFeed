<?php
return array(
    'title' => '//article[@id=\'material\']/header/h1',
    'test_url' => 'http://www.gloswielkopolski.pl/artykul/803547,abc-telemarketingu-praca-ktora-zwalnia-z-myslenia,id,t.html',
    'body' => array(
         '//section[@id=\'tresc\']',
    ),
    'next_page_link' => array(
         './/section[@id=\'tresc\']/div[@class=\'stronicowanie\']/a[@rel=\'next\']',
    ),
    'strip' => array(
         '//div[@class=\'podobneSonda\']',
    ),
);
