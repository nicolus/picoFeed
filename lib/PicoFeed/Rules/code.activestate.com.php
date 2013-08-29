<?php
return array(
    'title' => '//div[@id=\'page_header\']/h1',
    'test_url' => 'http://code.activestate.com/recipes/500261-named-tuples/',
    'body' => array(
         '//div[@id=\'content\']',
    ),
    'strip_id_or_class' => array(
         '\'lineno\'',
         '\'block-toolbar-button\'',
         '\'recipe_score\'',
    ),
    'strip' => array(
         '//div[@id=\'recipe_tools\']',
         '//div[@id=\'addcomment\']',
    ),
);
