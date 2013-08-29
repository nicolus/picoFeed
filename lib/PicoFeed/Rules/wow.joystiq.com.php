<?php
return array(
    'title' => '//h2[@class=\"posttitle\"]',
    'test_url' => 'http://wow.joystiq.com/2011/06/20/the-overachiever-guide-to-midsummer-festival-2011-achievements/',
    'body' => array(
         '//div[@class=\"post\"]',
    ),
    'strip' => array(
         '//h2[@class=\"posttitle\"]',
         '//p[@class=\"filed-under\"]',
    ),
);
