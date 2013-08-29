<?php
return array(
    'title' => '//meta[@property=\"og:title\"]/@content',
    'test_url' => 'http://online.wsj.com/article/SB10001424052970203363504577185322849515102.html',
    'test_url' => 'http://online.wsj.com/article/SB10001424052970204791104577110550376458164.html',
    'body' => array(
         '//div[@id=\'article_story_body\']',
         '//ul[@id=\'imageSlide\']//li[@class=\'firstSlide\']//img | (//div[@class=\'txt_body\']//p)[1]',
    ),
    'strip_id_or_class' => array(
         'insetFullBracket',
         'insettipBox',
         'recipeACShopAndBuyText',
    ),
    'strip' => array(
         '//div[contains(@class, \'insetContent\')]//cite',
         '//*[contains(@style, \'visibility: hidden;\')]',
         '//div[contains(@class, \'insetContent\') and not(contains(@class, \'image\'))]',
         '//div[contains(@class, \'carousel\')]',
    ),
);
