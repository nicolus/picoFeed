<?php
return array(
    'test_url' => 'http://stackoverflow.com/questions/4484289/id-like-to-understand-the-jquery-plugin-syntax',
    'body' => array(
         '//div[@class=\'post-text\' or @class=\'user-action-time\' or @class=\'user-details\' or @class=\'vote\'] | //div[@id=\'answers-header\']//h2',
    ),
    'strip_id_or_class' => array(
         'vote-up',
         'vote-down',
         'star-off',
         'favoritecount',
         '-share',
         'badgecount',
    ),
);
