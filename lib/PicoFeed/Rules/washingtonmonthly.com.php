<?php
return array(
    'title' => '//a[@class = \'headline-article\']',
    'test_url' => 'http://www.washingtonmonthly.com/magazine/julyaugust_2011/features/the_trinity_sisters030380.php',
    'body' => array(
         '//div[@class = \'article\']',
    ),
    'single_page_link' => array(
         '//a[@class = \'print\']',
    ),
    'strip' => array(
         '//p[@class = \'author\']',
         '//a[@class = \'headline-article\']',
         '//span[@class = \'date\']',
    ),
);
