<?php
return array(
    'title' => '//div[@id=\'csn_blogST_headline\']/h1',
    'test_url' => 'http://www.csnbayarea.com/blog/giants-talk/post/-?blog%2Fgiants-talk%2Fpost%2F-=&blockID=578902&feedID=5987',
    'body' => array(
         '//div[@id=\'csn_blogST_main\']',
    ),
    'strip_id_or_class' => array(
         'ipfootnotes',
    ),
    'strip' => array(
         '//div[@id=\'csn_blogST_main\']/p[1]/img',
         '//div[@id=\'csn_blogST_sidebar\']',
    ),
);
