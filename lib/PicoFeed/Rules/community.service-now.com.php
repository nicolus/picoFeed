<?php
return array(
    'title' => '//div[@id=\"center\"]//h2',
    'test_url' => 'http://community.service-now.com/blog/lawrenceeng/seasons-greetings-servicenow-team',
    'body' => array(
         '//div[@id=\"center\"]//div[@class=\"node\"]',
    ),
    'strip' => array(
         '//div[@id=\"center\"]//h2[1]',
         '//span[@class=\"submitted\"][1]',
    ),
);
