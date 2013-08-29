<?php
return array(
    'title' => '//div[@class=\'printbody\']/h1',
    'test_url' => 'http://www.truthdig.com/report/item/the_election_march_of_the_trolls_20110829/',
    'test_url' => 'http://www.truthdig.com/dig/item/the_death_of_truth_20130505/',
    'body' => array(
         '//div[@class=\'printbody\']',
    ),
    'strip' => array(
         '//div[@class=\'printbody\']/a[@href=\'http://www.truthdig.com/\']',
         '//table[@class=\'footer\']',
    ),
    'single_page_link' => array(
         '//a[contains(@href, \'/print/\')]',
    ),
);
