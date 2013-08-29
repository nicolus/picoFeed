<?php
return array(
    'test_url' => 'http://www.edge-online.com/features/telling-modern-warfares-story',
    'body' => array(
         '//h2[@class=\'strapline\'] | //article[contains(@class, \'node-article\')]',
    ),
    'strip' => array(
         '//footer',
    ),
    'single_page_link' => array(
         '//a[contains(@href, \'?page=show\')]',
    ),
);
