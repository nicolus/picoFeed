<?php
return array(
    'test_url' => 'http://blog.mariosc.com/book-recommendation-we-are-all-weird',
    'body' => array(
         '//div[starts-with(@id, \'post_\') and @class=\'post\'] | //article[starts-with(@id, \'post_\')]',
    ),
    'strip' => array(
         '//div[contains(@class, \'sharing\') or contains(@class, \'infobar\') or contains(@class, \'editbox\')]',
         '//aside[contains(@class, \'p_responses\')]',
         '//h2[starts-with(@id, \'posttitle_\')]',
         '//header | //footer',
         '//*[@id=\'extra_links\']',
         '//img[contains(@class, \'profile_border\')]',
    ),
);
