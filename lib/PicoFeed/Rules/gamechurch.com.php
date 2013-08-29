<?php
return array(
    'title' => '//h1[@class=\'title\']',
    'test_url' => 'http://gamechurch.com/virtual-gun-control-the-best-amendment/',
    'body' => array(
         '//div[@class=\'the-content\']',
    ),
    'strip' => array(
         '//div[@class=\'article-image responsive\']',
    ),
    'strip_id_or_class' => array(
         '\'pullquote\'',
    ),
);
