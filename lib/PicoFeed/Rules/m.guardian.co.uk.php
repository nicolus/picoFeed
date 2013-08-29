<?php
return array(
    'title' => '//p[@class=\"txhead\"]',
    'test_url' => 'http://m.guardian.co.uk/ms/p/gnm/op/s3OOwgO3yIhGuj41C1_S3Xg/view.m?id=15&gid=world/2012/jul/26/arctic-climate-change&cat=top-stories',
    'strip' => array(
         '//table[@class=\"tlogo\"]',
         '//div[@class=\"cookieText\"]',
         '//*[@class=\"sltb\"]',
         '//*[@class=\"ijobs-x-link\"]',
         '//*[@class=\"sponscolour\"]',
         '//*[@class=\"sponsouter\"]',
         '//div[@id=\"bottom-nav-block\"]/following::*',
    ),
);
