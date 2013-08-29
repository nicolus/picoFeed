<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://www.timeshighereducation.co.uk/story.asp?sectioncode=26&storycode=416124&c=1',
    'body' => array(
         '//div[@class=\"storytext\"]',
    ),
    'strip' => array(
         '//div[@id=\"thelogin\"]',
         '//*[@class=\"hide\"]',
         '//div[@id=\"anchored\"]',
    ),
);
