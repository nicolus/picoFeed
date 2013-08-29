<?php
return array(
    'title' => '//h1[@class=\'headline\']',
    'test_url' => 'http://abcnews.go.com/Politics/newt-gingrich-rocky-rollout-presidential-campaign-recover/story?id=13632744',
    'test_url' => 'http://abcnews.go.com/Blotter/family-freed-american-hostage-somalia-seals-obama/story?id=15439544',
    'body' => array(
         '//div[@id=\'storyText\']',
         '//img[@id=\'ff-img\'] | //div[@id=\'meta\']//div[contains(@class, \'overview\')]',
    ),
    'strip' => array(
         '//*[@id=\'date_partner\']',
         '//div[@class=\'breadcrumb\']',
         '//div[contains(@class,\'show_tools\')]',
         '//div[@id=\'sponsoredByAd\']',
         '//div[contains(@class,\'rel_container\')]',
         '//p[a[starts-with(@href, \'http://www.twitter.com\')]]',
         '//p[a[starts-with(@href, \'http://www.facebook.com\')]]',
         '//p[contains(., \'Click here to return to\')]',
    ),
    'strip_id_or_class' => array(
         'mediaplayer',
    ),
    'single_page_link' => array(
         'concat(//li[@class=\'pager\']//a/@href, \'&singlePage=true\')',
    ),
);
