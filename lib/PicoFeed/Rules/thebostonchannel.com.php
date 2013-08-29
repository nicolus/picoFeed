<?php
return array(
    'title' => '//meta[@name=\'og:title\']/@content',
    'test_url' => 'http://www.thebostonchannel.com/slideshow/news/28210648/detail.html',
    'body' => array(
         '//div[@class=\"StoryBody\" or @class=\"storyTeaser\"]',
    ),
);
