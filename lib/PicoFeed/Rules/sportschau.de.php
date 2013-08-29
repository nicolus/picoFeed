<?php
return array(
    'title' => '//div[@id=\'ardContent\']/h1',
    'test_url' => 'http://www.sportschau.de/sp/fussball/news201203/17/analyse_leverkusen_gladbach.jsp',
    'body' => array(
         '//div[@id=\'ardContent\']',
    ),
    'strip' => array(
         '//div[@id=\'ardContent\']/h1',
         '//p[@id=\'ardAutor\']',
         '//div[@class=\'embeddedPlayer_clipinfo\']',
         '//div[@class=\'ardMehrZumThemaRechts\']',
         '//*[contains(@class, \'inv\')]',
         '//p[@id=\'ardAbbinder\']',
         '//div[@class=\'socialBookmarks\']',
         '//div[@id=\'ardContentEnd\']',
         '//div[@id=\'ardDisclaimer\']',
         '//div[@id=\'ardRechteSpalte\']',
    ),
);
