<?php
return array(
    'test_url' => 'http://hammers.theoffside.com/carling-cup/a-funny-thing-happened-on-the-way-to-4-nil.html',
    'strip' => array(
         '//*[(@class = \'right_col\')]',
         '//*[(@class = \'category\')]',
         '/html/body/div[1][@class=\'absolute_content_high\']/div[1][@class=\'wrapper\']/div[1][@class=\'main_col\']/div[@class=\'main_content\']/h3',
    ),
);
