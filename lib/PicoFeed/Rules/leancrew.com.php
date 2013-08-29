<?php
return array(
    'title' => '//div[@id=\"content\"]/h1[1]',
    'test_url' => 'http://www.leancrew.com/all-this/2011/12/more-shell-less-egg/',
    'strip' => array(
         '//div[@id=\"content\"]/h1[1]',
         '//p[@class=\"postdate\"]',
         '//h2[@id=\"respond\"]',
         '//blockquote[@class=\"bbpTweet\"]/p/span/a/img',
    ),
);
