<?php
return array(
    'test_url' => 'http://ask.metafilter.com/159539/Connect-ZERO-I-feel-like-an-idiot',
    'body' => array(
         '//div[contains(@class, \'copy\') or contains(@class, \'comments\')]',
    ),
    'strip_id_or_class' => array(
         'related',
         'whitesmallcopy',
    ),
    'strip' => array(
         '//a[. = \'Subscribe\']',
         '//h1/span[@class = \'smallcopy\']',
         '//a[@class = \'skip\']',
         '//div[@id = \'logo\']',
         '//div[contains(@class, \'comments\') and contains(., \'You are not currently logged in\')]',
    ),
);
