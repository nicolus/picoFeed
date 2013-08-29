<?php
return array(
    'title' => '//meta[@property=\"og:title\"]/@content',
    'title' => '//h1[@class=\'storyheadline\']',
    'test_url' => 'http://money.cnn.com/2011/03/15/news/companies/steve_jobs_thought_process.fortune/index.htm?section=money_topstories&utm_source=feedburner&utm_medium=feed&utm_campaign=Feed%3A+rss%2Fmoney_topstories+%28Top+Stories%29',
    'test_url' => 'http://money.cnn.com/2012/01/27/markets/markets_newyork/index.htm',
    'test_url' => 'http://money.cnn.com/2012/05/13/technology/yahoo-ceo-out-rumor/index.htm',
    'body' => array(
         '//div[@id=\'storytext\' or @class=\'storytext\']',
    ),
    'strip_id_or_class' => array(
         'ie_column',
         'sharewidgets',
    ),
    'strip' => array(
         '//div[@class=\"hed_side\"]',
         '//span[@class=\"byline\"]',
         '//a[@class=\"soc-twtname\"]',
         '//span[@class=\"cnnDateStamp\"]',
         '//div[@class=\"storytimestamp\"]',
         '//div[@class=\"cnnCol_side\"]',
    ),
);
