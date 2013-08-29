<?php
return array(
    'test_url' => 'http://aht.seriouseats.com/archives/2009/12/the-burger-lab-salting-ground-beef.html',
    'body' => array(
         '//div[@id=\'content\']',
    ),
    'strip' => array(
         '//h2[@class=\'fn\'] | //h2[@class=\'double-lined\'] | //h3 | //div[@id=\'threeColumn2\'] | //div[@id=\'threeColumn3\']',
    ),
    'strip_id_or_class' => array(
         '\"recipe-feedback\"',
         '\"comments\"',
         '\"procedure-number\"',
         '\"more-with-author\"',
         '\"inner\"',
    ),
);
