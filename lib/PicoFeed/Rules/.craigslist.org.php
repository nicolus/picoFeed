<?php
return array(
    'title' => '//h2[@class=\'postingtitle\']',
    'test_url' => 'http://sfbay.craigslist.org/hhh/index.rss',
    'body' => array(
         '//figure[@class=\'iw\'] | //section[@class=\'cltags\' or @id=\'postingbody\']',
    ),
);
