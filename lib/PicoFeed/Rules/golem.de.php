<?php
return array(
    'title' => '//h1',
    'title' => '//body/h3',
    'test_url' => 'http://www.golem.de/1112/88696.html',
    'body' => array(
         '//div[@class=\'formatted\']',
    ),
    'strip' => array(
         '//ol[@class=\"list-chapters\"]',
         '//body/h3',
         '//body/b[1]',
         '//body/b[2]',
         '//body/b[3]',
         '//div[1]',
    ),
    'single_page_link' => array(
         '//a[contains(@href, \'print.php?a=\')]/@href',
    ),
);
