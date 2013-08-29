<?php
return array(
    'title' => '//div[@class=\'title\']',
    'test_url' => 'http://www.christianitytoday.com/ct/2012/aprilweb-only/my-god-forsaken-me.html',
    'body' => array(
         '//div[@id=\'body\']',
    ),
    'strip' => array(
         '//div[@class=\'title\']',
         '//div[@class=\'deck\']',
         '//div[@class=\'byline\']',
         '//div[@class=\'copyright\']',
         '//br',
    ),
);
