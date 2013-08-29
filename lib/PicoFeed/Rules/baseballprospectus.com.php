<?php
return array(
    'title' => '//h1[@class=\'title\']',
    'test_url' => 'http://www.baseballprospectus.com/article.php?articleid=18463',
    'body' => array(
         '//div[@class=\"article\"]',
    ),
    'strip' => array(
         '//div[@class=\'tools\']',
         '//h1',
         '//h2[@class=\'subtitle\']',
         '//p[@class=\'author\']',
         '//p[@class=\'date\']',
    ),
);
