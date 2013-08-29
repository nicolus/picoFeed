<?php
return array(
    'title' => 'substring-before(//title,\' ::\')',
    'test_url' => 'http://www.idealog.co.nz/blog/2012/12/geeks-plane-help-kiwis-take-san-francisco',
    'body' => array(
         '//div[@class=\'content\']',
    ),
    'strip' => array(
         '//p[@class=\'dateline\']',
         '//hr',
    ),
    'strip_id_or_class' => array(
         'share',
         'comments',
         'tags',
    ),
);
