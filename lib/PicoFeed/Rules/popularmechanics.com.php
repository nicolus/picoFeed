<?php
return array(
    'title' => '//div[@id=\'contentHeader\']//h1',
    'test_url' => 'http://www.popularmechanics.com/technology/aviation/crashes/what-really-happened-aboard-air-france-447-6611877',
    'next_page_link' => array(
         '//div[@id=\'longPagination\']/a[@class=\'next\']',
    ),
    'body' => array(
         '//div[@id=\'articleBody\']',
         '//div[@id=\'intelliTXT\']',
    ),
);
