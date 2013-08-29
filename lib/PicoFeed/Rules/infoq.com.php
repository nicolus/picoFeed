<?php
return array(
    'title' => '//div[@class=\"box-content\"]//h1[1]',
    'test_url' => 'http://www.infoq.com/interviews/oleg-zhurakousky-javaone2011-interview',
    'body' => array(
         '//div[@id=\"intTranscript\"]',
         '//div[@class=\"box-content\"]',
    ),
    'strip' => array(
         '//div[@class=\"box-content\"]//h1[1]',
         '//div[@class=\"box-content\"]//p[@class=\"info\"]',
         '//div[@class=\"addthis_toolbox addthis_default_style\"]',
    ),
    'strip_id_or_class' => array(
         'vendor-content-box',
         'tags2',
         'instructions',
         'comments',
         'forum-list-tree',
    ),
);
