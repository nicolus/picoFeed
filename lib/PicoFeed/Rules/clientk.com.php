<?php
return array(
    'title' => '//div[@class=\"entrytitle\"]/a',
    'test_url' => 'http://clientk.com/2011/12/19/the-impact-of-more/',
    'body' => array(
         '//div[@class=\"entrybody\"]',
    ),
    'strip' => array(
         '//div[@class=\"entrybody\"]//p[@class=\"singleinfo\"]',
    ),
);
