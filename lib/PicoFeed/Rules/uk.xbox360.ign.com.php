<?php
return array(
    'title' => '//h1[@class=\"headline\"]',
    'test_url' => 'http://uk.xbox360.ign.com/articles/121/1210717p1.html',
    'body' => array(
         '//div[@id=\"main-article-content\"]',
    ),
    'strip' => array(
         '//ul[@class=\"lnks-readmore\"]',
         '//div[@class=\"inlineImageCaption\"]',
         '//div[@style=\"width:468px\"]',
    ),
);
