<?php
return array(
    'title' => '//div[contains(@id, \'entrysubj\')]',
    'test_url' => 'http://dw-news.dreamwidth.org/28922.html',
    'strip_id_or_class' => array(
         '\'currents\'',
    ),
    'body' => array(
         '//div[contains(@class, \'usercontent\')]',
    ),
);
