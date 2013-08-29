<?php
return array(
    'test_url' => 'http://shifteleven.com/articles/2008/05/10/issue-tracking-git-ticgit',
    'body' => array(
         '//div[ @class=\'entry-content\' ]',
    ),
    'strip' => array(
         '//div[ contains(@class, \'sharing\') ]',
    ),
);
