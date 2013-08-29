<?php
return array(
    'title' => '//h1[@class=\'singlePageTitle\']',
    'test_url' => 'http://lifestyle.inquirer.net/100223/dusting-your-ceiling-fan',
    'strip' => array(
         '//p[contains(text(), \'Follow Us\')]',
         '//p/strong[contains(text(), \'Recent Stories:\')]',
         '//div[@id=\"sharefeature\"]',
    ),
);
