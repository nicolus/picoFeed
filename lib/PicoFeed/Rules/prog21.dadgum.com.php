<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://prog21.dadgum.com/105.html',
    'body' => array(
         '//div[@id=\'left\']',
    ),
    'strip' => array(
         '//h1',
         '//h1[. = \'Previously\']/following::*',
    ),
    'strip_id_or_class' => array(
         'entry-footer',
    ),
);
