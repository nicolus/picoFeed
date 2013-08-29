<?php
return array(
    'title' => '//h1[@id=\'article_headline\']',
    'test_url' => 'http://www.businessweek.com/magazine/buyback-insurance-a-good-deal-for-retailers-07282011.html',
    'test_url' => 'http://www.businessweek.com/articles/2012-06-06/american-pain-the-largest-u-dot-s-dot-pill-mills-rise-and-fall',
    'body' => array(
         '//div[@id=\'storyBody\']',
         '//div[@id=\'article_body\']',
         '//div[@id=\'story_body\']',
    ),
    'strip_id_or_class' => array(
         'inset',
         'page_count',
         'tools',
         'pagination',
    ),
    'strip' => array(
         '//p/span[@class=\'photoCredit\']',
         '//h1',
    ),
    'single_page_link' => array(
         '//li[@id=\'stPrint\']/a',
    ),
);
