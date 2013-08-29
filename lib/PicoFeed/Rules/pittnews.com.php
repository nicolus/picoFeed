<?php
return array(
    'title' => '//h2[@class=\'post-title\']',
    'test_url' => 'http://pittnews.com/newsstory/mens-basketball-pitt-recruit-robinson-to-bring-leadership/',
    'strip' => array(
         '//h2[@class=\'post-title\']',
         '//p[@class=\'post-details\']',
         '//h3[@class=\'post-byline\']',
    ),
    'body' => array(
         '//div[@id=\'content\']',
    ),
);
