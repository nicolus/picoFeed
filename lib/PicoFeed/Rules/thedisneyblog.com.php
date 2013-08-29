<?php
return array(
    'title' => '//h1[contains(@class, \'entry-title\')]',
    'test_url' => 'http://thedisneyblog.com/2012/11/17/videopolis-one-woman-disney-musical-beauty-and-the-beast/',
    'body' => array(
         '//div[@class=\'entry-content\']',
    ),
    'strip_id_or_class' => array(
         'bottomcontainerBox',
         'lightsocial_container',
    ),
);
