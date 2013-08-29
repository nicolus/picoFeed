<?php
return array(
    'title' => '//h1[contains(@class, \"headline\")]',
    'test_url' => 'http://www.theverge.com/2012/2/29/2821763/lytro-review',
    'test_url' => 'http://www.theverge.com/2011/11/3/2534861/nokia-lumia-800-review',
    'test_url' => 'http://www.theverge.com/2013/2/24/4026114/barnes-noble-shifting-focus-away-from-nook-hardware',
    'body' => array(
         '//article[contains(@class, \'feature-entry\')]',
         '//article',
    ),
    'strip' => array(
         '//article/header',
         '//*[@id=\'sticky-menu\']',
         '//aside',
         '//nav',
         '//q',
         '//a[contains(@class, \'entry-section-title\')]',
    ),
    'strip_id_or_class' => array(
         'gallery',
         'article-meta',
         'story-navigation',
         'slegend',
         'related-product-meta',
         'comments',
         'ui-jump-list',
         'pullquote',
    ),
);
