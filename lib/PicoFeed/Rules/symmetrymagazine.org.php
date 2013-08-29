<?php
return array(
    'title' => '//div[contains(@class, \"post\")]/h2',
    'test_url' => 'http://www.symmetrymagazine.org/breaking/?p=12784',
    'body' => array(
         '//div[contains(@class, \"post\")]',
    ),
    'strip' => array(
         '//div[contains(@class, \"post\")]/h2[1]',
         '//div[contains(@class, \"post\")]/p[1]',
         '//div[contains(@class, \"post\")]/p[position()=last()]',
    ),
);
