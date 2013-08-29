<?php
return array(
    'title' => '//meta[@name=\'title\']/@content',
    'test_url' => 'http://redtape.msnbc.msn.com/_news/2011/09/28/8020661-sprint-raises-fee-but-wont-free-users-from-two-year-contracts?preview=true',
    'body' => array(
         '//div[@class=\'articleText\']',
    ),
    'strip' => array(
         '//div[contains(@class, \'day\')]',
         '//div[contains(@class, \'month\')]',
         '//div[contains(@class, \'year\')]',
         '//div[contains(@class, \'time\')]',
         '//h1[@class=\'gl_headline\']',
         '//div[@class=\'byline\']',
         '//div[@id=\'left_ear\']',
         '//div[@id=\'right_ear\']',
         '//div[contains(@class, \'PopularPosts\')]',
    ),
);
