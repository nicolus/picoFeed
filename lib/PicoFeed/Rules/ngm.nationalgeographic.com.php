<?php
return array(
    'title' => '//div[@class=\'article_title\']//h1',
    'test_url' => 'http://ngm.nationalgeographic.com/2012/02/tsunami/folger-text',
    'next_page_link' => array(
         '//div[@class=\'nextpage_continue\']/a',
    ),
    'strip' => array(
         '//div[@class=\'nextpage_continue\']',
    ),
    'strip_id_or_class' => array(
         'nextpage',
    ),
    'body' => array(
         '//div[@class=\'article_title\']/..',
         '//div[@class=\'content\']',
    ),
);
