<?php
return array(
    'title' => '//div[@class=\"article\"]/h1',
    'test_url' => 'http://daringfireball.net/2011/10/apps_are_the_new_channels',
    'body' => array(
         '//div[@class=\"article\"]',
    ),
    'strip' => array(
         '//h6[@class=\"dateline\"]',
         '//div[@class=\"article\"]/h1',
    ),
);
