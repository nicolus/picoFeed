<?php
return array(
    'title' => '//meta[@property=\"og:title\"]/@content',
    'test_url' => 'http://theamericanscholar.org/too-big-to-fail-and-too-risky-to-exist/',
    'strip' => array(
         '//h4',
         '//a[@id=\"print_button\"]',
         '//p[@class=\"excerpt\"]',
         '//h3',
         '//div[@class=\"caption\"]',
         '//center/a/img',
    ),
);
