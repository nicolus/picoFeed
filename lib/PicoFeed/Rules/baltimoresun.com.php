<?php
return array(
    'title' => '//div[@class=\"story\"]/h1',
    'test_url' => 'http://www.baltimoresun.com/news/maryland/bs-md-omalley-budget-2-20120116,0,5340585.story',
    'single_page_link' => array(
         '//div[@class=\'toppaginate\']//a[@rel=\'nofollow\']',
    ),
    'body' => array(
         '//div[@id=\"story-body-text\"]',
    ),
    'strip' => array(
         '//*[@class=\'all\']',
         '//*[@class=\'articlerail\']',
    ),
);
