<?php
return array(
    'test_url' => 'http://catb.org/~esr/faqs/smart-questions.html',
    'body' => array(
         '//div[@class=\'article\']',
    ),
    'strip' => array(
         '//div[@class=\'revhistory\']',
         '//div[@class=\'toc\']',
    ),
);
