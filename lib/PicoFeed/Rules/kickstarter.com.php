<?php
return array(
    'title' => '//h1[@id=\'name\']',
    'test_url' => 'http://www.kickstarter.com/projects/hop/elevation-dock-the-best-dock-for-iphone',
    'body' => array(
         '//*[@id=\'leftcol\']',
    ),
    'strip_id_or_class' => array(
         '\'share-box\'',
         '\'project-faqs\'',
         '\'report-issue-wrap\'',
    ),
);
