<?php
return array(
    'title' => '//div[contains(@class, \"article\")]/h1',
    'test_url' => 'http://www.politico.com/news/stories/0712/78105.html',
    'body' => array(
         '//div[contains(@class,\"story-text\")]',
    ),
    'next_page_link' => array(
         '//ul[contains(@class,\"pagination\")]/li[contains(@class, \"current\")]/following-sibling::node()/a',
    ),
    'strip' => array(
         '//div[contains(@class, \"breadcrumbs\")]',
         '//a[contains(@class, \"hidden\")]',
         '//div[contains(@class, \"story-embed\")]',
         '//div[contains(@class, \"story-text\")]//p/a[contains(text(), \"Also on POLITICO:\")]/..',
    ),
);
