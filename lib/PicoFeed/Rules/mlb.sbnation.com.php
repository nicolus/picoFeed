<?php
return array(
    'title' => '//h1[@id = \'stream_title\']',
    'test_url' => 'http://mlb.sbnation.com/2011/10/17/2495845/2011-world-series-st-louis-cardinals-texas-rangers-home-field-advantage',
    'body' => array(
         '//div[@id = \'stream_container\']',
    ),
    'strip' => array(
         '//p[@class = \'byline\']',
    ),
    'strip_id_or_class' => array(
         'stream_summary',
         'social-spoken',
         'datetime',
         'author-mini-profile',
         'social-tools',
         'entry-tags',
         'fb-like-box',
    ),
);
