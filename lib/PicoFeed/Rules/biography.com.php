<?php
return array(
    'title' => '//div[contains(@class, \'main-content\')]//h1',
    'test_url' => 'http://www.biography.com/print/profile/martin-luther-9389283',
    'body' => array(
         '//div[@class=\'summary-column\'] | //div[contains(@class, \'main-content\')]',
    ),
    'single_page_link' => array(
         '//div[@id=\'biography-action-links\']//a[contains(@href, \'/print/\')]',
    ),
);
