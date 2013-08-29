<?php
return array(
    'title' => '//meta[@property=\"og:title\"]/@content',
    'test_url' => 'http://business.myjoyonline.com/pages/news/201202/81349.php',
    'body' => array(
         '//div[@id=\'story_photo\'] | //span[@class=\'story_text_1\']',
    ),
);
