<?php
return array(
    'test_url' => 'http://www.ynet.co.il/articles/0,7340,L-4354266,00.html',
    'test_url' => 'http://www.ynet.co.il/articles/0,7340,L-4354268,00.html',
    'test_url' => 'http://www.ynet.co.il/Integration/StoryRss2.xml',
    'body' => array(
         '//span[@id=\'article_content\' or @class=\'text16g\']',
    ),
    'strip' => array(
         '//div[.//div[contains(@id, \'ads.\')]]',
         '//p[contains(., \'עוד בערוץ החדשות של ynet:\')]',
         '//p[contains(., \'כותרות אחרונות מהעולם בחדשות ynet:\')]',
         '//div[contains(., \'אינציקלופדיית ynet:\')]',
         '//a[@class=\'bluelink\']',
    ),
);
