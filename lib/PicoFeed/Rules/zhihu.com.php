<?php
return array(
    'title' => '//h2[@class=\'zm-item-title\']',
    'test_url' => 'http://www.zhihu.com/question/20637942',
    'strip' => array(
         '//div[@class=\'zh-answers-title\']',
         '///div[@class=\'zm-item-vote-info \']',
         '//div[@class=\'zm-item-answer-author-info\']',
         '//div[@class=\'zu-blue-info-board zg-r3px\']',
    ),
);
