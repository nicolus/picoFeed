<?php
return array(
    'title' => '//div[@class=\'headline\'] | //div[@class=\'mod-header\']/h3',
    'test_url' => 'http://espn.go.com/boston/mlb/story/_/id/7092528/terry-francona-victim-latest-red-sox-smear-campaign',
    'body' => array(
         '//div[contains(@class, \'article\')]',
    ),
    'strip' => array(
         '//div[contains(@class, \'mod-inline\')]',
         '//*/span[@class=\'page-actions\']',
         '//div[@class=\'page-actions\']/*',
         '//div[@class=\'headline\'] | //div[@class=\'mod-header\']/h3',
         '//div[@class=\'mod-blog-navigation\']',
         '//div[@class=\'monthday\']',
         '//div[@class=\'time\']',
         '//div[@class=\'timeofday\']',
         '//div[contains(@class, \'mod-conversations\')]',
    ),
);
