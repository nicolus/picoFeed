<?php
return array(
    'title' => '//div[@id=\'article\']//h1',
    'test_url' => 'http://www.straightdope.com/columns/read/947/whatever-happened-to-adoption-of-the-metric-system-in-the-u-s',
    'body' => array(
         '//div[@id=\'article\' or @id=\'current_illustration\']',
    ),
);
