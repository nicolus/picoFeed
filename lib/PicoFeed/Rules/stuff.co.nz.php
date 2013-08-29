<?php
return array(
    'title' => '//div[@id=\'left_col\']/h1',
    'test_url' => 'http://www.stuff.co.nz/national/politics/3930344/PM-issues-challenge',
    'test_url' => 'http://www.stuff.co.nz/entertainment/7045944/International-praise-for-Ladyhawke',
    'body' => array(
         '//div[@id=\'left_col\']',
    ),
    'strip_id_or_class' => array(
         'toolbox',
         'story_features',
         'sharebox_new',
         'related_box',
         'sponsored_links',
         'hidden_ad',
         'story_content_top',
         'total_number',
         'sort_order',
         'subscribe_order',
    ),
    'strip' => array(
         '//div[contains(@class,\'ad_story\')]',
    ),
);
