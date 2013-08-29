<?php
return array(
    'test_url' => 'http://jandan.net/2011/04/03/iphone-5-sony.html',
    'body' => array(
         '//div[@id=\'content\']//div[@class = \'post f\']',
    ),
    'strip_id_or_class' => array(
         'comment-big',
         'avatar',
    ),
    'strip' => array(
         '//div[@class=\'time_s\']',
    ),
);
