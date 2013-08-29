<?php
return array(
    'title' => '//div[@class=\'articleLeft\']/h3',
    'test_url' => 'http://www.stalbansreview.co.uk/news/9581446.New_roundabout_in_King_Harry_Lane/r/?ref=rss',
    'body' => array(
         '//div[@class=\'articleLeft\']',
    ),
    'strip' => array(
         '//div[@class=\'articleMoreNews\']',
         '//div[@class=\'articleLeft\']/h3',
         '//div[@class=\'articleLeft\']/p[@class=\'articleInfo clearfix\']',
         '//div[@id=\'site\']/div[5][@class=\'holder\']/div[1][@class=\'hBlock\']/div[1][@class=\'sglCol article\']/h3',
    ),
);
