<?php
return array(
    'title' => '//div[@class=\'title\']',
    'test_url' => 'http://purpleplanetmedia.com/eye/inte/ngaiman.php',
    'body' => array(
         '//div[@class=\'body\']',
    ),
    'next_page_link' => array(
         '//div[@class=\'source\']/text()[contains(., \'page\')]/following-sibling::a',
    ),
);
