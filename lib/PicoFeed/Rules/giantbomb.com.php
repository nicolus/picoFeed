<?php
return array(
    'test_url' => 'http://www.giantbomb.com/the-elder-scrolls-v-skyrim/61-33394/',
    'strip_id_or_class' => array(
         'user-review-detail',
    ),
    'strip' => array(
         '//h1',
    ),
    'body' => array(
         '//div[@class=\"wiki-content\"]  |  //div[@class=\"section-bd\"]  |  //div[@class=\"news-story\"]',
    ),
);
