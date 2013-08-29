<?php
return array(
    'title' => '//h1[@class=\"article-title\"]',
    'test_url' => 'http://www.propublica.org/article/pardon-applicants-benefit-from-friends-in-high-places',
    'body' => array(
         '//div[@class=\"article-full\"]',
    ),
    'strip_id_or_class' => array(
         'sidebar_inject',
         'callout',
         'content-inset',
         'byline-block',
         'photo-caption',
         'foot-tools',
    ),
);
