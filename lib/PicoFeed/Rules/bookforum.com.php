<?php
return array(
    'title' => '//div[@class = \'Topper\']/h1',
    'test_url' => 'http://bookforum.com/inprint/018_04/8595',
    'body' => array(
         '//div[@class = \'Core\']',
    ),
    'strip' => array(
         '//div[@class = \'Topper\']/h1',
         '//div[@class = \'Topper\']/h3',
         '//div[@class = \'Topper\']/h4',
         '//div[@class = \'Topper\']/h5',
         '//div[@class = \'Topper\']/h6',
         '//br[@clear = \'all\']',
         '//div[@class = \'adCore\']',
         '//div[@class = \'BookR\']',
         '//div[@class = \'InfoBox\']',
    ),
);
