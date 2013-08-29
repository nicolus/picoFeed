<?php
return array(
    'title' => '//h1[@class=\'title\']',
    'test_url' => 'http://www.alistapart.com/articles/organizing-mobile/',
    'body' => array(
         '//*[@id=\'articletext\']',
    ),
    'strip_id_or_class' => array(
         '\'ishinfo\'',
         '\'metastuff\'',
         '\'learnmore\'',
         '\'discuss\'',
    ),
);
