<?php
return array(
    'title' => '//div[@id=\"cnnStoryHeadline\"]//h1',
    'title' => '//div[@class=\"siv_artHeader\"]//h1',
    'test_url' => 'http://sportsillustrated.cnn.com/2012/writers/peter_king/02/27/combine/index.html',
    'body' => array(
         '//div[@id=\"cnnStoryContent\"]',
         '//div[@class=\"siv_artPara\"]',
    ),
    'strip' => array(
         '//div[@id=\"cnnSCFontButtons\"]',
         '//div[@class=\"cnnDivideContent\"]',
         '//*[@class=\"cnnTMbox\"]',
    ),
    'next_page_link' => array(
         '//div[@id=\'cnnStoryContinue\']/a',
    ),
    'strip_id_or_class' => array(
         'cnnstorypagination',
    ),
);
