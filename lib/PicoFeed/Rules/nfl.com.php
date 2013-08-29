<?php
return array(
    'title' => '//div[@id=\"article-hdr\"]/h1',
    'test_url' => 'http://www.nfl.com/news/story/09000d5d82388707/article/close-shave-chiefs-haley-perseveres-through-rough-start?module=HP11_content_stream',
    'body' => array(
         '//div[@class=\"articleText\"]',
    ),
    'strip' => array(
         '//div[@class=\"removeformobile\"]',
    ),
);
