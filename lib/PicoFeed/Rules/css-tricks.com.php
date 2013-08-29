<?php
return array(
    'title' => '//article[contains(@id, \"post-\")]/h1',
    'test_url' => 'http://css-tricks.com/off-canvas-menu-with-css-target/',
    'body' => array(
         '//article[contains(@id, \"post-\")]',
    ),
    'strip' => array(
         '//article[contains(@id, \"post-\")]/p[@class=\"time\"]/time',
    ),
);
