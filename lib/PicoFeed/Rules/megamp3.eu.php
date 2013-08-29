<?php
return array(
    'title' => '//h3[@class=\'episode_title\']',
    'test_url' => 'http://www.megamp3.eu/?p=episode&name=2013-04-19_la_filiere_progressive_431.mp3',
    'test_url' => 'http://www.megamp3.eu/feed.xml',
    'body' => array(
         '//ul[contains(@class, \'episode_imgdesc\')]/li/descendant::*',
    ),
);
