<?php
return array(
    'title' => '//div[@class=\'meta\']//a[@id=\'titleHref\']',
    'test_url' => 'http://www.dailykos.com/story/2012/01/26/1058790/-Newt-Gingrichs-campaign-admits-he-lied-during-debate-about-ABC-News-interview-with-his ex-wife',
    'body' => array(
         '//div[@id=\'article-1\']//div[contains(@class, \'article-body\')]',
    ),
    'strip_id_or_class' => array(
         'invisible',
         'divider-doodle',
    ),
);
