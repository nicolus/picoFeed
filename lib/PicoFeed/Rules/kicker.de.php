<?php
return array(
    'title' => '//div[@id=\'ovArtikel\']/h1',
    'test_url' => 'http://www.kicker.de/news/fussball/frauen/wmfr/frauen-weltmeisterschaft/2011/3/1123662/spielbericht_frankreich-frauen_deutschland-frauen.html',
    'body' => array(
         '//div[@id=\'ovArtikel\']',
    ),
    'strip' => array(
         '//div[@id=\'ovArtikel\']/h1',
         '//*/div[@class=\'bu\']',
         '//*/div[@class=\'credit\']',
         '//*/div[@class=\'ad-head\']',
         '//*/div[@class=\'linksebay\']',
         '//*/div[@class=\'ovVideo\']',
    ),
);
