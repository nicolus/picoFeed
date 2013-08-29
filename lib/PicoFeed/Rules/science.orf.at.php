<?php
return array(
    'title' => '//div[@class=\"storybox\"]//h1',
    'test_url' => 'http://science.orf.at/stories/1700900/',
    'body' => array(
         '//div[@class=\"storybox\"]',
    ),
    'strip' => array(
         '//p[@class=\'metaline\']',
         '//div[@class=\'fact\']',
         '//p[@class=\'backlink\']',
         '//div[@class=\'mailto\']',
         '//div[@id=\'forumDisclaimer\']',
         '//div[@class=\'forum\']',
    ),
);
