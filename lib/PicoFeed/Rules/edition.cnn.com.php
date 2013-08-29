<?php
return array(
    'test_url' => 'http://edition.cnn.com/2011/US/04/29/severe.weather/index.html',
    'body' => array(
         '//div[@id=\'cnnContentContainer\']//div[contains(@class, \'cnn_strycntntlft\')]',
    ),
    'strip' => array(
         '//div[@id=\'cnnCVP2\']',
    ),
    'strip_id_or_class' => array(
         'cnn_strylftcexpbx',
         'cnn_strylctcqrelt',
         'cnn_strybtntoolsbttm',
         'cnn_stryftsbttm',
         'cnn_strybtmcntnt',
    ),
);
