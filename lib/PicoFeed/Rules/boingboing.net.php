<?php
return array(
    'title' => '//h2[@class=\"headline\"]',
    'test_url' => 'http://boingboing.net/2011/10/23/understanding-the-hyperrich-through-the-lens-of-tomorrows-history.html',
    'single_page_link' => array(
         '//h2[@class=\"headline\"]/a',
    ),
    'body' => array(
         '//div[@class=\"post\"]',
    ),
    'strip_id_or_class' => array(
         'shareMe',
         'authorbox',
         'byline',
    ),
);
