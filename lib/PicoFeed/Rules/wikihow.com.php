<?php
return array(
    'test_url' => 'http://www.wikihow.com/Start-Your-Own-Country',
    'body' => array(
         '//div[@id=\'bodycontents\']',
    ),
    'strip_id_or_class' => array(
         'editsection',
    ),
    'strip' => array(
         '//div[contains(@class, \'step_num\')]',
    ),
    'single_page_link' => array(
         '//a[@id=\'gatPrintView\']',
    ),
);
