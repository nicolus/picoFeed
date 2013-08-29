<?php
return array(
    'title' => '//h1[@class=\'post-title\']',
    'test_url' => 'http://tvrecaps.ew.com/recap/fringe-season-4-episode-2/',
    'next_page_link' => array(
         '//span[@class=\'paging-next\']/a[contains(., \'NEXT\')]',
    ),
    'strip_id_or_class' => array(
         'article-paging',
         'eyebrow',
         'underbar',
         'extras',
         'share',
         'recap-links',
         'tvr-author',
         'pub-date',
         'post-title',
    ),
);
