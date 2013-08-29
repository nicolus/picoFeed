<?php
return array(
    'title' => '//*[@class=\'primary\']/h1',
    'test_url' => 'http://shawnblanc.net/2011/11/kindle-touch-review/',
    'body' => array(
         '//div[@class=\'primary\']',
    ),
    'strip' => array(
         '//*[@class=\'primary\']/h1',
         '//*[@class=\'articledate\']',
         '//*[@class=\'detailsarticle\']',
         '//*[@class=\'endnav\']',
         '//*[@class=\'endmeta\']',
    ),
);
