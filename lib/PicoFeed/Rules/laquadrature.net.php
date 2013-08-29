<?php
return array(
    'title' => '//h1[@class=\'title\']',
    'test_url' => 'http://www.laquadrature.net/en/finalization-of-eu-parliaments-weak-net-neutrality-resolution',
    'body' => array(
         '//div[@id=\'content-content\']//div[@class=\'content\']',
    ),
    'strip' => array(
         '//div[@class=\'terms terms-inline\']',
         '//div[@class=\'more\']',
         '//div[@class=\'share-links\']',
         '//table[@id=\'attachments\']',
    ),
);
