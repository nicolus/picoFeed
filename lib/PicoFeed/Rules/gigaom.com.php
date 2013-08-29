<?php
return array(
    'title' => '//meta[@property=\'og:title\']/@content',
    'test_url' => 'http://gigaom.com/2011/10/24/groupon-google-lawsuit/',
    'test_url' => 'http://gigaom.com/2012/12/26/snapchat-rises-why-pokes-decline-shows-facebooks-inability-to-invent/',
    'body' => array(
         '//div[starts-with(@id, \'post-content-\')]',
    ),
    'strip_id_or_class' => array(
         'sharedaddy',
    ),
);
