<?php
return array(
    'title' => '//h1[@class = \'articleTitle\']',
    'test_url' => 'http://www.scientificamerican.com/article.cfm?id=do-brain-scans-comatose-patients-reveal-conscious-state',
    'test_url' => 'http://www.scientificamerican.com/article.cfm?id=solar-wind-transforms-venus-into-shape-of-comet',
    'body' => array(
         '//div[@id = \'articleContent\']',
    ),
    'single_page_link' => array(
         '//a[contains(@href, \'print=true\')]',
    ),
    'strip' => array(
         '//div[@class = \'fsgBooks\']',
    ),
);
