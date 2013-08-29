<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://www.scilogs.de/wblogs/blog/formbar/fusion/2012-10-08/rundgang-durch-deutschlands-gr-tes-fusionsexperiment',
    'body' => array(
         '//div[@class=\'entrybody\']',
    ),
    'strip_id_or_class' => array(
         'socialshareprivacy',
    ),
    'strip' => array(
         '//div[@class=\'entrybody\']/br[1]',
         '//div[@class=\'entrybody\']/p[last()]',
         '//div[@class=\'entrybody\']/ul[last()]',
    ),
);
