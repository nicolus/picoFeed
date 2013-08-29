<?php
return array(
    'test_url' => 'http://thenextweb.com/apple/2011/10/12/tnw-review-a-complete-guide-to-apples-ios-5-with-icloud-an-os-14-years-in-the-making/',
    'body' => array(
         '//div[@class= \'article-body\']',
    ),
    'strip' => array(
         '//div[@class = \'bargo\']',
         '//div[@class = \'tf\']',
         '//div[@class = \'article\']/div[@class = \'blue-box\']',
    ),
    'strip_id_or_class' => array(
         'respond',
    ),
    'next_page_link' => array(
         '//div[@class=\'pages-wrapper\']//span/following-sibling::a/@href',
    ),
);
