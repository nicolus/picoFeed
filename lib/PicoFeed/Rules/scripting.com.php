<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://scripting.com/stories/2011/07/08/yeahImStillYawning.html',
    'strip' => array(
         '//a[starts-with(@href, \'#\')]',
         '//*[@class=\'storyByline\']',
    ),
    'body' => array(
         '//*[@class=\'storyPageText\']/..',
    ),
);
