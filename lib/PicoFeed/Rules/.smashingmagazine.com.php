<?php
return array(
    'title' => '//article[contains(@id, \"post-\")]/h2',
    'test_url' => 'http://wp.smashingmagazine.com/2012/11/08/complete-guide-custom-post-types/',
    'body' => array(
         '//article[contains(@id, \"post-\")]',
    ),
    'strip' => array(
         '//div[@class=\"ad ed\"]',
    ),
);
