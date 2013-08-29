<?php
return array(
    'test_url' => 'http://plus.google.com/u/0/117840649766034848455/posts/FddaP6jeCqp',
    'body' => array(
         '//div[@id=\'contentPane\']//div[@class=\'vg\']',
         '//div[@id=\'contentPane\']',
    ),
    'strip' => array(
         '//*[@title=\"People who +1\'d this\"]/../..',
         '//*[contains(@class, \'a-b-f-i-Hg-Uf\')]',
         '//*[@role=\'menu\']',
         '//img[contains(@alt, \'profile photo\')]',
         '//*[@class=\'a-f-i-Ad\']',
    ),
);
