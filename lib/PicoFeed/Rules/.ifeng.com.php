<?php
return array(
    'title' => '//h1[contains(@id,\'artical_topic\')]',
    'test_url' => 'http://news.ifeng.com/history/zhongguojindaishi/detail_2012_04/01/13605159_0.shtml',
    'body' => array(
         '//div[contains(@id,\'artical_real\')]',
    ),
    'next_page_link' => array(
         '//*[contains(@id,\'pagenext\')]',
    ),
);
