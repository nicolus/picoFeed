<?php
return array(
    'test_url' => 'http://www.telegraph.co.uk/news/worldnews/europe/ireland/8663451/Is-Ireland-divorcing-from-the-Catholic-Church.html',
    'body' => array(
         '//div[@class=\'byline\' or @id=\'storyEmbSlide\' or @id=\'mainBodyArea\']',
    ),
    'strip' => array(
         '//p[@class=\'comments\']',
         '//div[@id=\'storyEmbSlide\']//div[contains(@class, \"hide\")]',
         '//div[@id=\'tmg-related-links\' or @id=\'outbrain-related-links\' or @id=\'onespot-related-links\']',
         '//p[@class=\'bbpTweet\']/span[@class=\'timestamp\']',
         '//p[@class=\'bbpTweet\']/span[@class=\'metadata\']//img',
    ),
);
