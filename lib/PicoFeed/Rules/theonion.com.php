<?php
return array(
    'title' => '//h2[@class=\'title\']',
    'test_url' => 'http://www.theonion.com/articles/pathetic-bobcats-owner-again-regaling-players-with,27572/',
    'body' => array(
         '//div[@class=\'story\']',
    ),
    'strip' => array(
         '//h2[@class=\'title\']',
         '//p[@class=\'meta\']',
         '//div[@class=\'ga_section\']',
         '//div[@id=\'recent_slider\']',
    ),
);
