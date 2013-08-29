<?php
return array(
    'test_url' => 'http://www.csnphilly.com/eagles/can-stoutland-save-danny-watkins-career',
    'body' => array(
         '//csn_blogST_main',
    ),
    'strip' => array(
         '/html/body/div[4]/div[3]/div/div/div/section/div/div/div/div/div/div',
         '/html/body/div[4]/header',
         '//div[contains(@style, \'none\')]',
    ),
    'strip_id_or_class' => array(
         'article-right-sidebar',
         'rsn-gigya-sharebar-container',
         'article-bottom',
         'hider',
         'footer',
         'masthead',
         'block-menu-menu-rsn-login-or-register',
         'block-menu-menu-header-links',
         'block-rsn-follow-bar-follow-bar',
         'block-rsn-weather-rsn-weather-scoreboard',
         'logo',
         'element-invisible',
         'site-name',
    ),
);
