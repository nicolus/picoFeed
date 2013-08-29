<?php
return array(
    'title' => '//h2[@class=\"lyt-hdg-02-04\"]',
    'test_url' => 'http://news.mynavi.jp/articles/2011/12/07/nico/index.html',
    'body' => array(
         '//div[@class=\"articleContent\"]',
    ),
    'strip' => array(
         '//div[@id=\"tab-aside\"]',
    ),
);
