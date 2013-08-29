<?php
return array(
    'title' => '//h1[@class=\'storyheadline\']',
    'test_url' => 'http://tech.fortune.cnn.com/2011/03/17/why-startups-dont-go-public-anymore/?section=money_topstories&utm_source=feedburner&utm_medium=feed&utm_campaign=Feed%3A+rss%2Fmoney_topstories+%28Top+Stories%29',
    'body' => array(
         '//div[@class=\'storytext\']',
    ),
    'strip' => array(
         '//strong',
    ),
);
