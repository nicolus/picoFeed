<?php
return array(
    'title' => '//div[@id=\'savageColumn_head\']/h1',
    'title' => '//h1[@class=\"headlineLarge\"]',
    'test_url' => 'http://www.thestranger.com/seattle/SavageLove?oid=5135029',
    'strip' => array(
         '//div[@id=\'savage_right\'] | //div[@id=\'savageColumn_head\'] | //div[@id=\'savageArticleRight\'] | //div[@id=\'articleRight\'] | //div[@class=\'savAppBanner\']',
    ),
    'body' => array(
         '//div[@id=\'savageColumn\']',
         '//div[@id=\'story_text\']',
    ),
);
