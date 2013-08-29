<?php
return array(
    'title' => '//h1[@class = \'postTitle\']',
    'test_url' => 'http://blogs.scientificamerican.com/a-blog-around-the-clock/2012/07/10/science-blogs-definition-and-a-history/',
    'body' => array(
         '//div[@id = \'singleBlogPost\']',
    ),
    'strip' => array(
         '//p[@class = \'moreLink mobileHide\']',
         '//div[@id = \'comments2\']',
         '//h3[a[@href = \'#add-comment\']]',
    ),
);
