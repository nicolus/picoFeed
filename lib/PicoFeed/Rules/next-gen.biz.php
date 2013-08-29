<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://www.next-gen.biz/reviews/deus-ex-human-revolution-review',
    'single_page_link' => array(
         '//a[@class=\"single active\"]',
    ),
    'body' => array(
         '//div[@id=\"main\"]//div[@class=\"content-region\"]/article',
    ),
    'strip_id_or_class' => array(
         '//aside[@id=\"related\"]',
    ),
    'strip' => array(
         '//footer',
    ),
);
