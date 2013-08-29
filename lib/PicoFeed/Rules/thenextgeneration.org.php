<?php
return array(
    'title' => '//h1[@class=\'interior-page-title\']',
    'test_url' => 'http://thenextgeneration.org/blog/post/rebrand-announce/',
    'body' => array(
         '//div[@class=\'rich-text-body\']',
    ),
    'strip' => array(
         '//div[@class=\'byline\']',
         '//div[@class=\'offscreen-menu\']',
    ),
);
