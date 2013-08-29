<?php
return array(
    'title' => 'substring-after(//h2, \'：\')',
    'title' => 'substring-after(//h2, \':\')',
    'title' => '//h2',
    'test_url' => 'http://omm.hk/%E4%B8%AD%E5%9B%BD%E9%9D%92%E5%B9%B4%E6%8A%A5%EF%BC%9A%E5%AE%AA%E6%B3%95%E8%AF%BE.html',
    'body' => array(
         '//div[@class=\'entry\']',
    ),
    'strip' => array(
         '//div[contains(@class, \'post-ratings\')]',
    ),
);
