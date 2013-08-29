<?php
return array(
    'test_url' => 'http://www.inc.com/guides/2010/11/seven-tips-for-lobbying-politicians.html',
    'test_url' => 'http://www.inc.com/eric-schurenberg/startups-are-we-geting-irrationally-exuberant.html',
    'body' => array(
         '//div[@id=\'text\']',
         '//div[@id= \'articlecontent\']',
    ),
    'strip' => array(
         '//div[@id= \'articlecontent\']/h1',
         '//div[@id=\'articlecontent\']/p[@class=\'deck\']',
         '//div[@id=\'articlecontent\']/div[@class=\'byline\']',
         '//div[@id=\'articlespacer\']',
         '//div[@id=\'incsharebox\']',
         '//div[@id=\'articlesidebar\']',
         '//a[contains(., \'Dig Deeper\')]',
    ),
    'single_page_link' => array(
         '//a[contains(@href, \'Printer_Friendly.html\')]',
    ),
);
