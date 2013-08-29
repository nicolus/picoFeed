<?php
return array(
    'title' => '//div[@class=\'post_content\']/h2',
    'test_url' => 'http://www.mikeindustries.com/blog/archive/2011/10/never-be-another',
    'body' => array(
         '//div[@class=\'entry\']',
    ),
    'strip' => array(
         '//div[@class=\'closer\']',
         '//div[@class=\'navigation\']',
         '//div[@class=\'aux_pane\']',
         '//div[@class=\'aux_aux_pane\']',
    ),
);
