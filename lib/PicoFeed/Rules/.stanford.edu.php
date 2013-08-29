<?php
return array(
    'title' => '//div[@id=\'aueditable\']/h1',
    'test_url' => 'http://plato.stanford.edu/entries/supervenience/',
    'body' => array(
         '//div[@id=\'content\']',
    ),
    'strip' => array(
         '//div[@id=\'message\' or @id=\'linklist\']',
    ),
);
