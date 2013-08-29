<?php
return array(
    'title' => 'substring-after(//title, \'Coyote Tracks - \')',
    'test_url' => 'http://tracks.ranea.org/post/31431060205/the-next-big-uh-slightly-taller-thing',
    'strip' => array(
         '//div[@class=\"column left\"]',
         '//div[@class=\"pages\"]',
         '//a[@class=\"text_title\"]',
         '//ol[@class=\"notes\"]',
    ),
);
