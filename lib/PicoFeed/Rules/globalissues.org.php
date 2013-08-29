<?php
return array(
    'test_url' => 'http://www.globalissues.org/article/39/a-primer-on-neoliberalism',
    'body' => array(
         '//div[@id=\'content\']',
    ),
    'strip' => array(
         '//p[@class=\'top\']',
         '//h2[.=\'Where next?\']',
    ),
    'strip_id_or_class' => array(
         'where-next',
         'social-bookmarks',
         'link-to-here',
         'options-heading',
         'page-options-content',
         'page-info-bottom',
    ),
);
