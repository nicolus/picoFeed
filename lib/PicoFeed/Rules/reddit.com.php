<?php
return array(
    'title' => '//p[@class=\"title\"]/a/text()',
    'test_url' => 'http://www.reddit.com/r/truegaming/comments/wfe7r/i_wrote_about_the_problems_i_honestly_feel_that/',
    'test_url' => 'http://www.reddit.com/r/worldnews/comments/1as37r/twelve_north_korean_soldiers_attempting_to_defect/',
    'body' => array(
         '//div[@class=\"expando\"]//div[@class=\"usertext-body\"]',
    ),
    'strip_id_or_class' => array(
         'tagline',
         'unvotable-message',
         'buttons',
    ),
    'single_page_link' => array(
         '//p[@class=\"title\"]/a[contains(@href, \'http://\')]',
    ),
);
