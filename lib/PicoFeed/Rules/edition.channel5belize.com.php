<?php
return array(
    'title' => '//div[@id=\'singlePage\']//h2',
    'test_url' => 'http://edition.channel5belize.com/archives/86016',
    'test_url' => 'http://edition.channel5belize.com/feed',
    'body' => array(
         '//div[@id=\'singlePage\']//div[contains(@class, \'post\')]',
    ),
    'strip' => array(
         '//a[@title=\'Email This Story\']',
    ),
    'strip_id_or_class' => array(
         'sociable',
    ),
);
