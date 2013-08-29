<?php
return array(
    'test_url' => 'http://www.dpreview.com/articles/6126592906/first-impressions-using-the-fujifilm-x-pro1',
    'next_page_link' => array(
         '//img[@alt = \'Next page\']/../@href',
         '//*[@class = \'pages\']/*/td[@class = \'next enabled\']/a',
    ),
    'single_page_link' => array(
         '//a[contains(.,\'Print view\')]',
    ),
);
