<?php
return array(
    'test_url' => 'http://www.telegraaf.nl/binnenland/10275097/__Identiteit_man_in_sloot_onbekend__.html?cid=rss',
    'body' => array(
         '//div[@id=\'artikelKolom\']',
    ),
    'strip' => array(
         '//div[@class=\'broodMediaBox\']/div[@class=\'docbox\' or @class=\'artBannerWrapper\']',
         '//div[@id=\'artikeltoolbar\']',
         '//div[@class=\'reactiebalk artspacer\' or @class=\'bannercenter clearfix artspacer\']',
         '//div[@id=\'artikelKolomRechts\' or @id=\'TMGTweetWidget\']',
    ),
);
