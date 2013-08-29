<?php
return array(
    'test_url' => 'http://en.espnf1.com/monaco/motorsport/story/50529.html',
    'body' => array(
         '//div[@id=\'content\']',
    ),
    'strip' => array(
         '//div[@class=\'rl\']',
         '//p[@class=\'authdesc\']',
         '//p[@class=\'strybtm\']',
         '//div[@id=\'stryFtrLft\']',
         '//div[@id=\'f1Conversation\']',
         '//div[@id=\'cmtSpncrRuler\']',
         '//div[@id=\'stryComments\']',
         '//div[@id=\'athrData\']',
    ),
);
