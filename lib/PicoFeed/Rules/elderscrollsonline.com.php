<?php
return array(
    'title' => '//h1[contains(@class, \"alpha\")]',
    'test_url' => 'http://elderscrollsonline.com/en/rss',
    'test_url' => 'http://elderscrollsonline.com/en/news/post/2013/03/27/developer-question-of-the-week-17',
    'body' => array(
         '//article[contains(@class, \"news-post\")]',
    ),
);
