<?php
return array(
    'title' => '//h1[@class=\'title\']',
    'test_url' => 'http://robots.thoughtbot.com/post/32455387133/four-phase-test',
    'body' => array(
         '//section[@class=\'post text\']',
    ),
    'strip' => array(
         '//section[@class=\'meta-info\']',
    ),
);
