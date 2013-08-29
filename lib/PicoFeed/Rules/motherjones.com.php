<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://motherjones.com/politics/2012/02/mac-mcclelland-free-online-shipping-warehouses-labor',
    'body' => array(
         '//div[@id = \'content-area\']',
    ),
    'next_page_link' => array(
         '//div[@class=\'node-pager\']/a[contains(@class, \'next\')]',
    ),
    'strip_id_or_class' => array(
         'node-header',
         'hdr-tools',
         'node-body-break',
         'pullquote',
         'node-pager',
         'author-bio',
         'node-footer',
    ),
);
