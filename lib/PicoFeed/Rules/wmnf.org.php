<?php
return array(
    'title' => '//div[@class=\"bodyText\"]/h1/text()',
    'test_url' => 'http://www.wmnf.org/news_stories/light-rail-advocates-join-forces-to-combat-opposition-in-pinellas',
    'body' => array(
         '//div[@class=\"bodyText\"]',
    ),
    'strip' => array(
         '//div[@class=\"bodyText\"]/h1/text()',
         '//div[@class=\"bodyText\"]/span[@class=\"info\"]',
         '//div[@class=\"bodyText\"]/span[@class=\"info\"]',
    ),
);
