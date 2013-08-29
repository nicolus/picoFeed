<?php
return array(
    'title' => '//h1[@id=\'stream_title\']',
    'test_url' => 'http://www.sbnation.com/nba/2012/3/13/2867226/dwight-howard-trade-rumors-2012-faq-orlando-magic',
    'body' => array(
         '//div[@class=\'node-article\']',
    ),
    'strip_id_or_class' => array(
         'fb-like-box',
         'stream-fb-like',
         'social-meta',
         'social-spoken',
         'twitter-share-button',
         'twitter-follow-button',
         'spinner_node_list',
         'node-sort-link',
         'stream_title',
         'stream_summary',
         'update-count-container',
         'major-updates',
         'newsletter-slide',
         'author-mini-profile',
         'byline',
         'header',
         'footer',
    ),
);
