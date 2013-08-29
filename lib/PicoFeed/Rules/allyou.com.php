<?php
return array(
    'title' => '//div[@id=\'pageHdr\']//h1',
    'test_url' => 'http://www.allyou.com/budget-home/money-shopping/freebies-online-00400000066392/',
    'body' => array(
         '//div[@id=\'pageHdr\']/*[@class=\'dek\'] | //div[@id=\'printArticle\' or @id=\'slideShowPrint\']',
    ),
    'strip' => array(
         '//div[contains(@class, \'infoBox\') or @id=\'infoBox\']',
    ),
    'single_page_link' => array(
         '//li[@id=\'print\']/a',
    ),
);
