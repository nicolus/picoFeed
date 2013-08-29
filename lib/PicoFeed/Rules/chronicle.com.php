<?php
return array(
    'title' => '//h1[contains(@class, \"entry-title\")]',
    'test_url' => 'http://chronicle.com/article/In-a-Land-of-Second-Chances/128375/',
    'body' => array(
         '//div[contains(@class, \"abstract\")]',
         '//div[@id=\"article-body\"]',
    ),
    'strip' => array(
         '//div[@id=\"related\"]',
         '//div[contains(@class, \"image\")]',
    ),
);
