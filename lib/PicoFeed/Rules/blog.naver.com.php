<?php
return array(
    'title' => '//span[@class=\'pcol1 itemSubjectBoldfont\']',
    'test_url' => 'http://blog.naver.com/how2invest/110135068757',
    'body' => array(
         '//div[@id=\'postListBody\']',
    ),
    'single_page_link' => array(
         '/html/frameset/frame[1]/attribute::src',
    ),
    'strip' => array(
         '//div[@class=\'post-btn\']',
    ),
);
