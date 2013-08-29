<?php
return array(
    'test_url' => 'http://www.nbweekly.com/news/china/201203/29316.aspx',
    'body' => array(
         '//div[contains(@class,\'contWarp\')]',
    ),
    'strip' => array(
         '//div[contains(@class,\'keyWord\')]',
         '//div[contains(@class,\'submitComt\')]',
         '//div[contains(@class,\'cmts\')]',
         '//div[contains(@class,\'notice\')]',
         '//div[contains(@class,\'part pt-second\')]',
    ),
);
