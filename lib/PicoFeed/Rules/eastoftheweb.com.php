<?php
return array(
    'title' => '//div[@class=\'title_text\']',
    'test_url' => 'http://www.eastoftheweb.com/short-stories/UBooks/Horl.shtml',
    'body' => array(
         '//div[@class=\'story_text\']/..',
    ),
    'strip' => array(
         '//b',
    ),
    'strip_id_or_class' => array(
         'back_to_top',
         'author_text',
         'title_text',
    ),
);
