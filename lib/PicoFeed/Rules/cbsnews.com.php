<?php
return array(
    'title' => '//div[@id=\'contentBody\']//h1',
    'test_url' => 'http://www.cbsnews.com/8301-201_162-57366361/rescued-americans-dad-proud-of-the-u.s/',
    'body' => array(
         '//div[@id=\'storyMediaBox\'] | //div[contains(@class, \'storyText\')]',
    ),
    'strip' => array(
         '//div[@class=\"scrollingArrows\"]',
         '//div[@class=\"timeLine\"]',
         '//dl[@class=\"storyBlogByline\"]',
         '//span[@class=\'image-credit\']',
    ),
);
