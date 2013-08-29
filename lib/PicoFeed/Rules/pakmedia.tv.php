<?php
return array(
    'title' => '//h1[@class=\'entry-title\']',
    'test_url' => 'http://pakmedia.tv/tv-one/feed',
    'body' => array(
         '//article//div[@class=\'entry\']',
    ),
    'strip_id_or_class' => array(
         'addthis',
         'gdsrcacheloader',
         'entry-meta',
         'entry-tags',
         'authorbox',
    ),
    'strip' => array(
         '//div[@class=\'entry\']/p[1]',
         '//img[@width=\'600\' and @height=\'70\']',
         '//h3[contains(., \'Related posts\')]',
         '//div[contains(@style, \'border: 0pt none ; margin: 0pt; padding: 0pt;\')]',
    ),
);
