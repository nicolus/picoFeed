<?php
return array(
    'title' => '//h1[@class=\'title\']',
    'test_url' => 'http://www.collegehumor.com/article/6599562/how-it-happened-the-necktie',
    'body' => array(
         '//div[@class=\'article_body\']',
    ),
    'strip' => array(
         '//p[@class=\'ca_intro\']',
         '//div[@id=\'action_bar\']',
         '//div[@class=\'below_content\']',
         '//div[@id=\'announcement\']',
         '//div[@id=\'leftovers\']',
         '//div[@class=\'form\']',
         '//div[@id=\'email_overlay\']',
         '//a[@class=\'close\']',
    ),
);
