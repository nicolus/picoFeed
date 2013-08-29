<?php
return array(
    'title' => '//div[@class=\"header\"]/h1',
    'test_url' => 'http://bostonglobe.com/news/nation/2012/03/17/illinois-primary-could-pivotal/PsDzFZqvhEYyXbOcF9FOkO/story.html',
    'body' => array(
         '//div[@class=\"article-body\"]',
    ),
    'strip_id_or_class' => array(
         'aside',
         'promo',
         'skip-nav',
         'article-more',
         'article-bar',
         'figure',
    ),
);
