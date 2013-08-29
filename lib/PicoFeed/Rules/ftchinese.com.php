<?php
return array(
    'title' => 'substring-before(//title, \'-\')',
    'test_url' => 'http://www.ftchinese.com/story/001049088',
    'body' => array(
         '//div[@id=\"bodytext\"]',
    ),
    'strip' => array(
         '//div[@class=\'pagination\']',
    ),
    'single_page_link' => array(
         '//div[@class=\'pagination\']/a[.=\'全文\']',
    ),
);
