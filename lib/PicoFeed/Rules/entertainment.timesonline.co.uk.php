<?php
return array(
    'title' => '//h1[@class = \'heading\']',
    'test_url' => 'http://entertainment.timesonline.co.uk/tol/arts_and_entertainment/the_tls/article7177738.ece',
    'body' => array(
         '//div[@id = \'related-article-links\']',
    ),
    'strip' => array(
         '//div[@id = \'comment-sort-order\']',
         '//div[@id = \'my-profile\']',
         '//div[@class = \'article-author\']',
         '//div[@class = \'bg-f8f1d8 width-385 text-left\']',
         '//div[@id = \'login-status\']',
         '//div[@class = \'puff-padding\']',
    ),
);
