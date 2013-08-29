<?php
return array(
    'test_url' => 'http://vitispr.com/blog/coventry-is-a-technology-hotspot',
    'strip' => array(
         '//*[(@id = \"ja-search\")]',
         '//h3[contains(span,\'Related Posts\')]',
         '//img',
    ),
    'body' => array(
         '//*[(@id = \"ja-mainbody\")]',
         '//*[(@id = \"content-mass-bottom\")]',
    ),
);
