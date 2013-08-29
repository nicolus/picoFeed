<?php
return array(
    'title' => '//div[@class=\'posthead\']//h2',
    'test_url' => 'http://www.redmondpie.com/how-to-play-music-directly-from-home-screen-folders-on-iphone/',
    'body' => array(
         '//div[contains(@class, \'postcontent\') or @class=\'posthead\']',
    ),
    'strip' => array(
         '//div[@class=\'posthead\']//h2',
    ),
    'strip_id_or_class' => array(
         'likeThisPost',
    ),
);
