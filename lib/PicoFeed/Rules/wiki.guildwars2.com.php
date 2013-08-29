<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://wiki.guildwars2.com/wiki/Guardian',
    'body' => array(
         '//div[@id=\'content\']',
    ),
    'strip_id_or_class' => array(
         'editsection',
         'toc',
    ),
    'strip' => array(
         '//div[@id=\'siteNotice\']',
         '//div[@id=\'content\']//table[last()]',
    ),
);
