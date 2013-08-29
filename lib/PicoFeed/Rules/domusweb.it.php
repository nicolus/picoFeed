<?php
return array(
    'title' => 'substring-before(//h2[@class=\'title\'],\'&mdash;\')',
    'test_url' => 'http://www.domusweb.it/en/design/in-praise-of-lost-time/',
    'body' => array(
         '//div[@id=\'maincontainer\']',
    ),
    'strip' => array(
         '//div[contains(@class,\'domusnetwork\')]',
         '//div[contains(@class,\'relative_wrapper\')]',
         '//div[contains(@class,\'captionsubimage\')]/img[contains(@class,\'arrow\')]',
    ),
);
