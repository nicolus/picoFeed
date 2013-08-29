<?php
return array(
    'title' => '//div[@class=\'address\']/span',
    'test_url' => 'http://www.nasa.gov/mission_pages/kepler/news/kepler-21b.html',
    'body' => array(
         '//div[@class=\'default_style_wrap\']',
    ),
    'strip' => array(
         '//div[@class=\'text_adjust\']',
         '//div[@class=\'skiplink\']',
         '//h2',
    ),
);
