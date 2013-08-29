<?php
return array(
    'title' => '//h1[@class=\'articletitle\']',
    'test_url' => 'http://www.pittscriptblog.com/2012-articles/march/2012-football-opponents-set-and-the-attendance-dilemma.html',
    'body' => array(
         '//div[@class=\'article\']',
    ),
    'strip' => array(
         '//div[@class=\'headline\']',
         '//p[@class=\'articleinfo\']',
    ),
);
