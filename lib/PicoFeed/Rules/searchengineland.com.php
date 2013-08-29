<?php
return array(
    'title' => '//div[@class=\"storyBox\"]/h1',
    'test_url' => 'http://searchengineland.com/googles-jaw-dropping-sponsored-post-campaign-for-chrome-106348',
    'body' => array(
         '//div[@class=\"storyBox\"]',
    ),
    'strip' => array(
         '//h1',
         '//p[@class=\"homeStory tdmSideInfo\"]',
         '//div[@id=\"bylineShare\"]',
         '//script',
         '//hr',
    ),
    'strip_id_or_class' => array(
         'homeStory',
         'authorpic',
         'insideComments',
         'authorbio',
         'gpt-ad-sel-cube',
         'smxTextAd',
    ),
);
