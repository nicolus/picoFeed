<?php
return array(
    'title' => '//div[@class=\'headline\'] | //div[@class=\'mod-header\']/h3',
    'test_url' => 'http://sports.espn.go.com/espn/page2/story?page=simmonsnfl2010/lebron_james_return_clevelend&sportCat=nba',
    'body' => array(
         '//div[contains(@class, \'article\')]',
    ),
    'strip' => array(
         '//div[contains(@class, \'mod-inline\')]',
         '//*/span[@class=\'page-actions\']/a',
         '//*/span[@class=\'page-actions\']/a',
         '//div[@class=\'page-actions\']/*',
         '//div[@class=\'headline\'] | //div[@class=\'mod-header\']/h3',
         '//div[@class=\'mod-blog-navigation\']',
         '//div[@class=\'monthday\']',
         '//div[@class=\'time\']',
         '//div[@class=\'timeofday\']',
    ),
);
