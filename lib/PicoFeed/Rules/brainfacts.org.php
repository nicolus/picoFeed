<?php
return array(
    'title' => '//div[@class=\"standard\"]/h1',
    'test_url' => 'http://brainfacts.org/diseases-disorders/childhood-disorders/articles/2011/autism-the-pervasive-developmental-disorder/',
    'strip' => array(
         '//p[@class=\"skip\"]',
         '//div[@class=\"meta\"]',
         '//div[@class=\"standard\"]/h1',
         '//div[@class=\"modal\"]',
         '//div[@class=\"columnRight\"]',
    ),
);
