<?php
return array(
    'title' => '//div[@class=\"cnn_storyarea\"]/h1',
    'test_url' => 'http://www.cnn.com/2012/05/13/us/new-york-police-policy/index.html?eref=rss_topstories',
    'strip' => array(
         '//div[@class=\"cnn_storyarea\"]/h1',
    ),
    'strip_id_or_class' => array(
         'cnnByline',
         'cnn_strytmstmp',
         'cnn_strycaptiontxt',
         'cnn_strybtntoolsbttm',
         'cnn_strybtntools',
         'cnn_strybtmcntnt',
         'cnn_containerwht',
         'cnn_stryathrtmp',
    ),
);
