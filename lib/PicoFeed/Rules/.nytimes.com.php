<?php
return array(
    'test_url' => 'http://www.nytimes.com/2010/07/13/science/13gravity.html?_r=1&amp;pagewanted=print',
    'test_url' => 'http://www.nytimes.com/2011/05/15/world/middleeast/15prince.html?_r=1&hp',
    'strip' => array(
         '//*[@id=\'insideNYTimesScrollWrapper\']  |  //*[contains(@class, \'articleInline\')]',
    ),
    'single_page_link' => array(
         '//li[@class=\'singlePage\']/a',
    ),
);
