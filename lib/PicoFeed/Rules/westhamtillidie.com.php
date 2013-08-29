<?php
return array(
    'title' => 'substring-before(//title, \'«\')',
    'test_url' => 'http://www.westhamtillidie.com/2012/03/11/twelve-things-we-learned-from-the-doncaster-game/',
    'body' => array(
         '//div[@class=\'entry\']',
    ),
    'strip' => array(
         '//div[@class=\'sharing_label\']',
         '//div[@class=\'snap_nopreview sharing robots-nocontent\']',
    ),
);
