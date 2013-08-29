<?php
return array(
    'title' => '//p[@class=\'title\']',
    'test_url' => 'http://www.appleinsider.com/articles/12/02/29/inside_os_x_108_mountain_lion_safari_52_gets_a_simplified_user_interface_with_new_sharing_features.html',
    'strip' => array(
         '//p[text() = \'By \']',
    ),
    'body' => array(
         '//td[@class=\'bod\']',
    ),
    'strip_id_or_class' => array(
         'title',
         'minor',
         'multipagefooter',
    ),
);
