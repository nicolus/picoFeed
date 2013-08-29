<?php
return array(
    'test_url' => 'http://www.designtagebuch.de/die-gefuehlte-lesbarkeit/',
    'body' => array(
         '//div[@class=\'main\']',
    ),
    'strip_id_or_class' => array(
         'pagelink',
         'wp-polls',
    ),
    'next_page_link' => array(
         '//div[@class=\'post-page-next\']/a',
    ),
);
