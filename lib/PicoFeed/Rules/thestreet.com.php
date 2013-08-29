<?php
return array(
    'title' => '//div[@id=\'storyHdr\']/h1',
    'title' => '//div[@id=\'print\']//h2',
    'test_url' => 'http://www.thestreet.com/story/11386556/1/which-of-these-10-dividend-stocks-is-worth-the-risk.html',
    'test_url' => 'http://www.thestreet.com/story/11387090/1/7-ubs-stock-picks-for-2012.html',
    'body' => array(
         '//div[@class=\"virtualpage\"]',
         '//div[@id=\'print\']//div[@id=\'bd\']',
    ),
    'strip_id_or_class' => array(
         'articleFooter',
         'sidebar',
         'ie6PrintSubhead',
         'subHdr',
    ),
    'single_page_link' => array(
         '//div[@id=\'storyDetail\']//a[contains(@href, \'/print/\')]',
    ),
);
