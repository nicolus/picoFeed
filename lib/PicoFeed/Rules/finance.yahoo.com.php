<?php
return array(
    'title' => '//meta[@property=\'og:title\']/@content',
    'test_url' => 'http://sg.finance.yahoo.com/news/Motorola-takes-wraps-249-rsg-3508842732.html?x=0&.v=1',
    'test_url' => 'http://finance.yahoo.com/news/super-young-retirement-savers.html',
    'body' => array(
         '//div[@id=\'y-article-bd\']',
         '//div[contains(@class, \'yom-art-content\')]',
    ),
    'strip' => array(
         '//div[contains(@class, \'related-companies\')]',
         '//div[@id=\'y-article-related\']',
         '//div[@id=\'ypf-article-related\']',
    ),
    'single_page_link' => array(
         '//div[@class=\'ft\']//a[contains(@href, \'page=all\')]',
    ),
);
