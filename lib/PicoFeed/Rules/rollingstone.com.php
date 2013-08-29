<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://www.rollingstone.com/politics/news/the-plastic-bag-wars-20110725',
    'body' => array(
         '//div[@id=\'main\']/h2 | //div[@id=\'main\']//div[@class=\'body\']',
    ),
    'single_page_link' => array(
         '//a[@class=\'print-page\']',
    ),
);
