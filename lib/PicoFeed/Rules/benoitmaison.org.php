<?php
return array(
    'title' => 'h1[@class=\"entry-title\"]',
    'test_url' => 'http://www.benoitmaison.org/2011/12/06/why-siri-had-to-start-in-beta/',
    'body' => array(
         '//div[@class=\"entry-content\"]',
    ),
    'strip' => array(
         '//div[@class=\"entry-content\"]/div[last()]',
    ),
);
