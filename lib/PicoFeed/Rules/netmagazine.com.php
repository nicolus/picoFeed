<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://www.netmagazine.com/opinions/nielsen-wrong-mobile',
    'body' => array(
         '//div[@id=\"main-content\"]',
    ),
    'strip' => array(
         '//h1',
         '//div[@class=\"submitted\"]',
         '//dd[@class=\"profile-avatar\"]',
         '//div[@class=\"author-profile\"]/dl/dt[1]',
         '//div[@id=\"right-col\"]',
    ),
);
