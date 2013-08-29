<?php
return array(
    'title' => '//h1[@class=\'headline\']',
    'test_url' => 'http://www.laphamsquarterly.org/essays/balanced-diets.php',
    'body' => array(
         '//div[@class=\'article\']',
    ),
    'strip' => array(
         '//div[@class=\'article\']//h3[contains(@class, \'section\')]',
         '//div[@class=\'article\']//ul[contains(@class, \'article-actions\')]',
         '//div[@id=\'syndication-upper\']',
         '//a[@id=\'syndication\']',
         '//dl[@id=\'article-tags\']',
         '//div[@id=\'article-like\']',
    ),
    'single_page_link' => array(
         '//li[@class=\'single-page\']/a',
    ),
);
