<?php
return array(
    'test_url' => 'http://technologizer.com/2010/03/08/the-secret-origin-of-windows/',
    'next_page_link' => array(
         '//a[contains(., \'NEXT PAGE\')]',
    ),
    'strip' => array(
         '//span[@class=\'pageo\']/following::node()',
         '//span[@class=\'pageo\']',
    ),
);
