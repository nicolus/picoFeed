<?php
return array(
    'title' => 'substring-before(//title, \'|\')',
    'test_url' => 'http://www.boundlessline.org/2011/06/the-nyts-on-gender-over-the-weekend.html',
    'body' => array(
         '//div[@class=\"entry\"]',
    ),
    'strip' => array(
         '//div[@class=\"entry\"]/a[1]',
    ),
);
