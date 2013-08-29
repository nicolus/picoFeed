<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://news.cnet.com/8301-27076_3-57405303-248/apple-ipad-charging-fine-keep-it-plugged-in/?tag=mncol;posts',
    'strip' => array(
         '//h1',
         '//p[@id=\"introP\"]',
         '//div[@class=\"postByline\"]',
         '//div[@class=\"editorBio\"]',
         '//div[@class=\"inline-slideshow\"]',
         '//div[@class=\"related\"]',
    ),
    'strip_id_or_class' => array(
         'breadcrumb',
    ),
    'body' => array(
         '//div[@class=\"postBody txtWrap\"]',
    ),
);
