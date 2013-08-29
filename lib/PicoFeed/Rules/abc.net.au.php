<?php
return array(
    'title' => '//div[@class=\'article section\']//h1',
    'test_url' => 'http://www.abc.net.au/news/2013-03-27/open-speed-highways-change-clp-giles/4597892',
    'test_url' => 'http://www.abc.net.au/news/2013-04-30/credit-growth-remains-subdued/4660054?section=business',
    'body' => array(
         '//div[@class=\"page section\"]',
    ),
    'strip' => array(
         '//a[@class=\"inline-caption\"]',
         '//p[@class=\"ticker section noprint\"]',
         '//p[@class=\"topics\"]',
         '//h1',
         '//div[@class=\"byline\"]',
         '//p[@class=\"published\"]',
         '//div[contains(@class,\"featured-scroller\")]',
    ),
    'strip_id_or_class' => array(
         'footer',
    ),
);
