<?php
return array(
    'title' => '//h1[@class=\"entry-title\"]',
    'test_url' => 'http://venturebeat.com/2012/07/17/marissa-mayer-yahoo/#s:mayer-1',
    'body' => array(
         '//div[@class=\"entry-content\"]',
    ),
    'strip' => array(
         '//div[@class=\"vb-gallery\"]',
    ),
);
