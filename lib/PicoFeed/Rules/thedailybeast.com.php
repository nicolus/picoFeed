<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://www.thedailybeast.com/articles/2010/04/06/how-mastercard-predicts-divorce.html',
    'body' => array(
         '//article/div[contains(@class, \'article-body\')]',
    ),
    'strip' => array(
         '//footer[@class=\'storyFooter\']',
    ),
    'single_page_link' => array(
         '//li[@class=\'print\']/a',
    ),
);
